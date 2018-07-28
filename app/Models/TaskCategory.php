<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task_categories';

    /***
     * One Task Category can be used by multiple users
     *
     * A user can only have one task category
     *
     * @return mixed
     */
    public function profile()
    {
        return $this->hasOne('ChoreWeasel\Models\Profile', 'task_category_id');
    }

    /**
     * Get the task category group that owns the task category.
     */
    public function group()
    {
        return $this->belongsTo('ChoreWeasel\Models\TaskCategoryGroup');
    }
}
