<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MembersCreateRequest;
use App\Http\Requests\MembersUpdateRequest;
use App\Repositories\MembersRepository;
use App\Validators\MembersValidator;

use App\Repositories\TeamRepository;

use Session;

class MembersController extends Controller
{

    /**
     * @var MembersRepository
     */
    protected $repository;
    protected $teamRepository;

    /**
     * @var MembersValidator
     */
    protected $validator;

    public function __construct(TeamRepository $teamRepository,MembersRepository $repository, MembersValidator $validator)
    {
        $this->teamRepository = $teamRepository;
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $members = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $members,
            ]);
        }

        return view('adminlte::member_index', compact('members'));
    }
	public function create()
    {
		
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        // return view('teams/team_index', compact('teams'));
		$teams = $this->teamRepository->all();

        return view('adminlte::member_create',compact('teams'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  MembersCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MembersCreateRequest $request)
    {

        try {
			$membersInput = array('name' => Input::get('name'),'email' => Input::get('email'));
			$teamInput = Input::get('assign_team');


            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $memberId = $this->repository->createRow($membersInput);
			$assignTeam = $this->repository->assignTeam($teamInput,$memberId);

            $response = [
                'message' => 'Members created.',
                'data'    => $memberId,
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
			Session::flash('message', 'Members created.');


            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $member,
            ]);
        }

        return view('adminlte::member_show', compact('member'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = $this->repository->find($id);
		$teams = $this->teamRepository->all();
		$team_id = $this->repository->getAssignTeam($id);

        return view('adminlte::member_edit', compact('member','teams','team_id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MembersUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(MembersUpdateRequest $request, $id)
    {

        try {
			$membersInput = array('name' => Input::get('name'),'email' => Input::get('email'));
			$teamInput = Input::get('assign_team');

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $member = $this->repository->updateRow($membersInput,$id);
            $assignTeam = $this->repository->assignUpdateTeam($teamInput,$id);

            $response = [
                'message' => 'Members updated.',
                'data'    => $member,
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
			Session::flash('message', 'Members updated.');

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Members deleted.',
                'deleted' => $deleted,
            ]);
        }
		Session::flash('message', 'Members deleted.');

        return redirect()->back()->with('message', 'Members deleted.');
    }
}
