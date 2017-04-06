<?php
return [
    'Modpack\\V1\\Rest\\Issue\\Controller' => [
        'entity' => [
            'POST' => [
                'request' => '{
   "repository": "AoT",
   "name": "DerOli82",
   "title": "Found a bug",
   "description": "I\'m having a problem with this."
}',
                'response' => '{
  "id": 1,
  "url": "https://api.github.com/repos/octocat/Hello-World/issues/1347",
  "repository_url": "https://api.github.com/repos/octocat/Hello-World",
  "labels_url": "https://api.github.com/repos/octocat/Hello-World/issues/1347/labels{/name}",
  "comments_url": "https://api.github.com/repos/octocat/Hello-World/issues/1347/comments",
  "events_url": "https://api.github.com/repos/octocat/Hello-World/issues/1347/events",
  "html_url": "https://github.com/octocat/Hello-World/issues/1347",
  "number": 1347,
  "state": "open",
  "title": "Found a bug",
  "body": "I\'m having a problem with this.",
  "user": {
    "login": "octocat",
    "id": 1,
    "avatar_url": "https://github.com/images/error/octocat_happy.gif",
    "gravatar_id": "",
    "url": "https://api.github.com/users/octocat",
    "html_url": "https://github.com/octocat",
    "followers_url": "https://api.github.com/users/octocat/followers",
    "following_url": "https://api.github.com/users/octocat/following{/other_user}",
    "gists_url": "https://api.github.com/users/octocat/gists{/gist_id}",
    "starred_url": "https://api.github.com/users/octocat/starred{/owner}{/repo}",
    "subscriptions_url": "https://api.github.com/users/octocat/subscriptions",
    "organizations_url": "https://api.github.com/users/octocat/orgs",
    "repos_url": "https://api.github.com/users/octocat/repos",
    "events_url": "https://api.github.com/users/octocat/events{/privacy}",
    "received_events_url": "https://api.github.com/users/octocat/received_events",
    "type": "User",
    "site_admin": false
  },
  "labels": [
    {
      "id": 208045946,
      "url": "https://api.github.com/repos/octocat/Hello-World/labels/bug",
      "name": "bug",
      "color": "f29513",
      "default": true
    }
  ],
  "assignee": {
    "login": "octocat",
    "id": 1,
    "avatar_url": "https://github.com/images/error/octocat_happy.gif",
    "gravatar_id": "",
    "url": "https://api.github.com/users/octocat",
    "html_url": "https://github.com/octocat",
    "followers_url": "https://api.github.com/users/octocat/followers",
    "following_url": "https://api.github.com/users/octocat/following{/other_user}",
    "gists_url": "https://api.github.com/users/octocat/gists{/gist_id}",
    "starred_url": "https://api.github.com/users/octocat/starred{/owner}{/repo}",
    "subscriptions_url": "https://api.github.com/users/octocat/subscriptions",
    "organizations_url": "https://api.github.com/users/octocat/orgs",
    "repos_url": "https://api.github.com/users/octocat/repos",
    "events_url": "https://api.github.com/users/octocat/events{/privacy}",
    "received_events_url": "https://api.github.com/users/octocat/received_events",
    "type": "User",
    "site_admin": false
  },
  "milestone": {
    "url": "https://api.github.com/repos/octocat/Hello-World/milestones/1",
    "html_url": "https://github.com/octocat/Hello-World/milestones/v1.0",
    "labels_url": "https://api.github.com/repos/octocat/Hello-World/milestones/1/labels",
    "id": 1002604,
    "number": 1,
    "state": "open",
    "title": "v1.0",
    "description": "Tracking milestone for version 1.0",
    "creator": {
      "login": "octocat",
      "id": 1,
      "avatar_url": "https://github.com/images/error/octocat_happy.gif",
      "gravatar_id": "",
      "url": "https://api.github.com/users/octocat",
      "html_url": "https://github.com/octocat",
      "followers_url": "https://api.github.com/users/octocat/followers",
      "following_url": "https://api.github.com/users/octocat/following{/other_user}",
      "gists_url": "https://api.github.com/users/octocat/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/octocat/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/octocat/subscriptions",
      "organizations_url": "https://api.github.com/users/octocat/orgs",
      "repos_url": "https://api.github.com/users/octocat/repos",
      "events_url": "https://api.github.com/users/octocat/events{/privacy}",
      "received_events_url": "https://api.github.com/users/octocat/received_events",
      "type": "User",
      "site_admin": false
    },
    "open_issues": 4,
    "closed_issues": 8,
    "created_at": "2011-04-10T20:09:31Z",
    "updated_at": "2014-03-03T18:58:10Z",
    "closed_at": "2013-02-12T13:22:01Z",
    "due_on": "2012-10-09T23:39:01Z"
  },
  "locked": false,
  "comments": 0,
  "pull_request": {
    "url": "https://api.github.com/repos/octocat/Hello-World/pulls/1347",
    "html_url": "https://github.com/octocat/Hello-World/pull/1347",
    "diff_url": "https://github.com/octocat/Hello-World/pull/1347.diff",
    "patch_url": "https://github.com/octocat/Hello-World/pull/1347.patch"
  },
  "closed_at": null,
  "created_at": "2011-04-22T13:33:48Z",
  "updated_at": "2011-04-22T13:33:48Z",
  "closed_by": {
    "login": "octocat",
    "id": 1,
    "avatar_url": "https://github.com/images/error/octocat_happy.gif",
    "gravatar_id": "",
    "url": "https://api.github.com/users/octocat",
    "html_url": "https://github.com/octocat",
    "followers_url": "https://api.github.com/users/octocat/followers",
    "following_url": "https://api.github.com/users/octocat/following{/other_user}",
    "gists_url": "https://api.github.com/users/octocat/gists{/gist_id}",
    "starred_url": "https://api.github.com/users/octocat/starred{/owner}{/repo}",
    "subscriptions_url": "https://api.github.com/users/octocat/subscriptions",
    "organizations_url": "https://api.github.com/users/octocat/orgs",
    "repos_url": "https://api.github.com/users/octocat/repos",
    "events_url": "https://api.github.com/users/octocat/events{/privacy}",
    "received_events_url": "https://api.github.com/users/octocat/received_events",
    "type": "User",
    "site_admin": false
  }
}',
            ],
        ],
        'collection' => [
            'POST' => [
                'response' => '{
  "url": "https://api.github.com/repos/combak/Modpack-Webservice/issues/6",
  "repository_url": "https://api.github.com/repos/combak/Modpack-Webservice",
  "labels_url": "https://api.github.com/repos/combak/Modpack-Webservice/issues/6/labels{/name}",
  "comments_url": "https://api.github.com/repos/combak/Modpack-Webservice/issues/6/comments",
  "events_url": "https://api.github.com/repos/combak/Modpack-Webservice/issues/6/events",
  "html_url": "https://github.com/combak/Modpack-Webservice/issues/6",
  "id": 219981100,
  "number": 6,
  "title": "The title of the issue.",
  "user": {
    "login": "ComBak-Webservices",
    "id": 26673408,
    "avatar_url": "https://avatars0.githubusercontent.com/u/26673408?v=3",
    "gravatar_id": "",
    "url": "https://api.github.com/users/ComBak-Webservices",
    "html_url": "https://github.com/ComBak-Webservices",
    "followers_url": "https://api.github.com/users/ComBak-Webservices/followers",
    "following_url": "https://api.github.com/users/ComBak-Webservices/following{/other_user}",
    "gists_url": "https://api.github.com/users/ComBak-Webservices/gists{/gist_id}",
    "starred_url": "https://api.github.com/users/ComBak-Webservices/starred{/owner}{/repo}",
    "subscriptions_url": "https://api.github.com/users/ComBak-Webservices/subscriptions",
    "organizations_url": "https://api.github.com/users/ComBak-Webservices/orgs",
    "repos_url": "https://api.github.com/users/ComBak-Webservices/repos",
    "events_url": "https://api.github.com/users/ComBak-Webservices/events{/privacy}",
    "received_events_url": "https://api.github.com/users/ComBak-Webservices/received_events",
    "type": "User",
    "site_admin": false
  },
  "labels": [],
  "state": "open",
  "locked": false,
  "assignee": null,
  "assignees": [],
  "milestone": null,
  "comments": 0,
  "created_at": "2017-04-06T17:56:58Z",
  "updated_at": "2017-04-06T17:56:58Z",
  "closed_at": null,
  "body": "Issue posted by DerOli82: The contents of the issue.",
  "closed_by": null,
  "_links": {
    "self": {
      "href": "http://localhost:8080/issue"
    }
  }
}',
                'request' => '{
  "repository": "mws",
  "name" : "DerOli82",
  "title": "The title of the issue.",
  "description": "The contents of the issue."
}',
            ],
            'description' => 'Create a new issue into the given repository.',
        ],
    ],
    'Modpack\\V1\\Rest\\Repository\\Controller' => [
        'collection' => [
            'GET' => [
                'response' => '{
  "_links": {
    "self": {
      "href": "http://localhost:8080/repository?page=1"
    },
    "first": {
      "href": "http://localhost:8080/repository"
    },
    "last": {
      "href": "http://localhost:8080/repository?page=1"
    }
  },
  "_embedded": {
    "repository": [
      {
        "token": "mws",
        "name": "Modpack-Webservice",
        "owner": "combak"
      }
    ]
  },
  "page_count": 1,
  "page_size": 25,
  "total_items": 1,
  "page": 1
}',
                'description' => 'Return a set of all allowed repositories',
            ],
        ],
    ],
];
