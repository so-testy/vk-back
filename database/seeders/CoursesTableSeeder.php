<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimeStamp = DB::raw('CURRENT_TIMESTAMP');
        DB::table('courses')->insert(
            [
                'name' => 'Гимнастика для глаз',
                'description' => 'После длительной и напряженной зрительной работы',
                'image' => '15.svg',
                'duration' => 8,
                'start_date' => $currentTimeStamp,
                'progress' => json_encode(['type' => Course::PROGRESS_NONE, 'daysDone' => 0], JSON_UNESCAPED_UNICODE),
                'is_blocked' => Course::IS_BLOCKED_FALSE,
                'created_at' => $currentTimeStamp,
                'updated_at' => $currentTimeStamp,
            ]
        );
        DB::table('courses')->insert(
            [
                'name' => 'Профилактика близорукости',
                'description' => 'Интеративная гимнастика для глаз по методу Аветисова',
                'image' => '8.svg',
                'duration' => 30,
                'start_date' => null,
                'progress' => json_encode(['type' => Course::PROGRESS_ENDING, 'daysDone' => 11], JSON_UNESCAPED_UNICODE),
                'is_blocked' => Course::IS_BLOCKED_TRUE,
                'created_at' => $currentTimeStamp,
                'updated_at' => $currentTimeStamp,
            ]
        );
        DB::table('courses')->insert(
            [
                'name' => 'Профилактика косоглазия',
                'description' => 'Интерактивная гимнастика для глаз по методу Аветисова',
                'image' => '18.svg',
                'duration' => 15,
                'start_date' => null,
                'progress' => json_encode(['type' => Course::PROGRESS_ENDING, 'daysDone' => 0], JSON_UNESCAPED_UNICODE),
                'is_blocked' => Course::IS_BLOCKED_TRUE,
                'created_at' => $currentTimeStamp,
                'updated_at' => $currentTimeStamp,
            ]
        );
    }
}
