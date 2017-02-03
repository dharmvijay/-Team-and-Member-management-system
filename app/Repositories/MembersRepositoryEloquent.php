<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MembersRepository;
use App\Entities\Members;
use App\Validators\MembersValidator;
use DB;
/**
 * Class MembersRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MembersRepositoryEloquent extends BaseRepository implements MembersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Members::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MembersValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
	/**
     * update a row by repository
     */
	public function updateRow($input,$id)
    {
        $updateId = Members::where('id',$id)
            ->update($input);
		return true;
    }
	/**
     * create a row by repository
     */
	public function createRow($input)
    {
        $updateId = Members::insertGetId($input);
		return $updateId;
    }
	/**
     * create a row by repository
     */
	public function assignTeam($input,$id){
		
		$updateId = DB::table('assign_team')->insert(['team_id' => $input, 'member_id' => $id]);
		return true;
	
	}
	/**
     * create a row by repository
     */
	public function assignUpdateTeam($input,$id){
		$getAssignTeam = $this->getAssignTeam($id);
		if(!empty($getAssignTeam)){
			$updateId = DB::table('assign_team')->where('member_id', $id)->update(['team_id' => $input, 'member_id' => $id]);
		}else{
			$updateId = DB::table('assign_team')->insert(['team_id' => $input, 'member_id' => $id]);
		}
		return true;
	
	}
	/**
     * create a row by repository
     */
	public function getAssignTeam($id){
		
		$member_id = DB::table('assign_team')->where('member_id', $id)->first();
		return $member_id;
	
	}
	


}
