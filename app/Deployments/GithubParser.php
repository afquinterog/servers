<?php

namespace App\Deployments;

use App\Models\Commit;
use App\Models\Application;
use Illuminate\Support\Carbon;

class GithubParser
{
    /**
     * Parse a github commit and store in the commit storage
     */
    public function parse($data)
    {

        $commit = new Commit();

        $commit->http_repo = $data['repository']['html_url'];
        $commit->ssh_repo = $data['repository']['ssh_url'];
        $commit->branch = $this->getBranch($data);
        $commit->author = $data['head_commit']['committer']['name'];
        $commit->message = $data['head_commit']['message'] ?? "";
        $commit->timestamp = Carbon::parse($data['head_commit']['timestamp']);
        $commit->url = $data['head_commit']['url'] ?? "";
        $commit->previous = $data['before'];
        $commit->actual = $data['after'];

        $application = Application::select('id')->where('ssh_repo', $commit->ssh_repo)->first();
        $commit->application_id = $application->id;
        $commit->save();

        return $commit;

    }

    protected function getBranch($data)
    {
        $branch = explode("/", $data['ref']);
        return end($branch);
    }
}
