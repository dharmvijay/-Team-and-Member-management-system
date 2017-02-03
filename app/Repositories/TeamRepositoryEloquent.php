<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\teamRepository;
use App\Entities\Team;
use App\Validators\TeamValidator;

/**
 * Class TeamRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TeamRepositoryEloquent extends BaseRepository implements TeamRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Team::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TeamValidator::class;
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
        $updateId = Team::where('id',$id)
            ->update($input);
		return true;
    }
	public function createRow($input)
    {
        $updateId = Team::insert($input);
		return true;
    }
}
