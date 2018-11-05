<?php

namespace App\Http\Controllers;

use App\Conference;
use App\Experience;
use App\ProfileAttribute;
use App\Project;

class APIController extends Controller
{
    public function getProfile() {
        $profile = [];
        foreach (ProfileAttribute::all() as $attribute) {
            $profile[$attribute->name] = $attribute->value;
            if ($attribute->name == 'github') {
                $githubName = str_replace('https://github.com/', '', $attribute->value);
                $profile['github_name'] = $githubName;
            }
        }
        return $profile;
    }

    public function getJobs() {
        return Experience::get();
    }

    public function getConferences() {
        return Conference::get();
    }

    public function getProjects() {
    }

}
