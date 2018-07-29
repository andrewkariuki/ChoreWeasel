<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCategoryGroup extends Model
{
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task_category_groups';

      /**
     *
     * Fillable Fields for a User's Profile
     *
     * @var array
     */
    protected $fillable = [
        'groupname', 'groupdescription', 'groupimage',
    ];

    /***
     * One Task Category Group can be used by multiple Task Categories
     *
     * A Task Category can only have one task category group
     *
     * @return mixed
     */
    public function taskcategories()
    {
        return $this->hasMany('ChoreWeasel\Models\TaskCategory', 'task_category_group_id');
    }
}
