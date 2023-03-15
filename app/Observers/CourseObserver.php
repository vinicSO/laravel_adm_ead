<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\SUpport\Str;

class CourseObserver
{
    /**
     * Handle the Course "creating" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        $course->id = Str::uuid();
    }

}
