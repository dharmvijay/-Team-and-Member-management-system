<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TeamCreateRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Repositories\TeamRepository;
use App\Validators\TeamValidator;

use Session;


class TeamsController extends Controller
{

    /**
     * @var TeamRepository
     */
    protected $repository;

    /**
     * @var TeamValidator
     */
    protected $validator;

    public function __construct(TeamRepository $repository, TeamValidator $validator)
    {
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
        $teams = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $teams,
            ]);
        }

        return view('adminlte::team_index', compact('teams'));
    }
	public function create()
    {
		
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        // return view('teams/team_index', compact('teams'));
        return view('adminlte::team_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeamCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TeamCreateRequest $request)
    {
        try {

            // $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $team = $this->repository->createRow($request->all());

            $response = [
                'message' => 'Team created.',
                'data'    => $team,
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
			Session::flash('message', 'Team created.');
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
        $team = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $team,
            ]);
        }

        return view('teams.show', compact('team'));
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

        $team = $this->repository->find($id);

        return view('adminlte::team_edit', compact('team'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TeamUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function updateTeam(TeamUpdateRequest $request,$id)
    {
		// var_dump($request->all());
		// exit;
		
        try {

            // $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $team = $this->repository->updateRow(Input::all(),$id);

            $response = [
                'message' => 'Team updated.',
                'data'    => $team,
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
			Session::flash('message', 'Team updated.');

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
                'message' => 'Team deleted.',
                'deleted' => $deleted,
            ]);
        }
		Session::flash('message', 'Team deleted.');
        return redirect()->back()->with('message', 'Team deleted.');
    }
}
