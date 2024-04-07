# WP REST API
- Implementation of custom end points for CURD operations for custom post types (`rt-movie`, `rt-person`)

## Endpoints
route | method | description
--- | --- | ---
`rtml/v1/movie` | `GET` | Returns all the posts of type `rt-movie`
`rtml/v1/movie` | `POST` | Creates a new post of type `rt-movie`
`rtml/v1/movie/<id>` | `GET` | Gets post by id.
`rtml/v1/movie/<id>` | `POST`, `PUT` | Updates existing post of type `rt-movie`
`rtml/v1/movie/<id>` | `DELETE` | Deletes an existing post
`rtml/v1/person` | `GET` | Returns all the posts of type `rt-person`
`rtml/v1/person` | `POST` | Creates a new post of type `rt-person`
`rtml/v1/person/<id>` | `GET` | Gets post by id.
`rtml/v1/person/<id>` | `POST`, `PUT` | Updates existing post of type `rt-person`
`rtml/v1/person/<id>` | `DELETE` | Deletes an existing post

## Usage

1. `GET` `rtml/v1/movie` 
    - Returns all the posts

```json
[
    {
        "ID": 149,
        "author": "1",
        "type": "rt-movie",
        "date": "2023-06-14 23:26:39",
        "date_gmt": "2023-06-14 23:26:39",
        "title": "The Silence Of The Lambs",
        "content": "<!-- wp:paragraph -->\n<p>urna venenatis. 
        Praesent ac ... Nullam ipsum dui, cursus eget ante vitae, 
        ...
        ...
        lobortis elementum lorem. Vestibulum ante ipsu",
        "status": "publish",
        "meta": {
            "rt-movie-meta-basic-rating": [
                "7"
            ],
            "rt-movie-meta-basic-runtime": [
                "74"
            ],
            "rt-movie-meta-basic-release-date": [
                "2014-12-09"
            ],
            "rt-movie-meta-basic-content-rating": [
                "PG-13"
            ],
            "rt-movie-meta-crew-director": [
                72,
                95
            ],
            "rt-media-meta-img": [
                69
            ],
            "rt-media-meta-video": [
                76,
                75
            ],
            "rt-movie-meta-crew-producer": [
                72
            ],
            "rt-movie-meta-crew-actor": [
                5,
                72,
                79
            ],
            "rt-movie-meta-crew-writer": [
                101
            ]
        },
        "taxonomies": {
            "rt-movie-genre": [
                28,
                27
            ],
            "rt-movie-language": [
                18
            ]
        },
        "_links": {
            "https://api.w.org/post_type": [
                {
                    "href": "http://abhinav-ramesh-belhekar.local/wp-json/wp/v2/posts/1?_fields=title,link,type",
                    "attributes": {
                        "post_type": "post",
                        "embeddable": true
                    }
                },
                {
                    "href": "http://abhinav-ramesh-belhekar.local/wp-json/wp/v2/posts/1?_fields=title,link,type",
                    "attributes": {
                        "post_type": "post",
                        "embeddable": true
                    }
                },
                {
                    "href": "http://abhinav-ramesh-belhekar.local/wp-json/wp/v2/posts/1?_fields=title,link,type",
                    "attributes": {
                        "post_type": "post",
                        "embeddable": true
                    }
                },
                {
                    "href": "http://abhinav-ramesh-belhekar.local/wp-json/wp/v2/posts/1?_fields=title,link,type",
                    "attributes": {
                        "post_type": "post",
                        "embeddable": true
                    }
                }
            ],
            "https://api.w.org/attachment": [
                {
                    "href": false,
                    "attributes": []
                },
                {
                    "href": false,
                    "attributes": []
                }
            ],
            "https://api.w.org/term": [
                {
                    "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-genre/crime/",
                    "attributes": []
                },
                {
                    "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-genre/thriller/",
                    "attributes": []
                },
                {
                    "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-language/korean/",
                    "attributes": []
                }
            ]
        }
    },
    {
        "ID": 148,
        "author": "1",
        "type": "rt-movie",
        "date": "2023-06-14 23:26:17",
        "date_gmt": "2023-06-14 23:26:17",
        "title": "The Shawshank Redemption",
        "content": "<!-- wp:paragraph -->\n<p>urna venenatis. Praesent ac ..."

```

2. `POST` `rtml/v1/movie` | Creates a new post of type `rt-movie`

**Header**
```
Content-Type: application/json
Authorization: Basic cnRjYW1wOnBQdXMgVkl1TiBqWFFvIEFpZVAgbHV6ZiBaYWti
User-Agent: PostmanRuntime/7.36.3
Accept: */*
Cache-Control: no-cache
Postman-Token: 858b6add-6965-46a4-88f8-0faf591afb1f
Host: abhinav-ramesh-belhekar.local
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 330
```

**Body**
```json
{
    "title" : "Abhinav2",
    "content" : "Test content",
    "meta" : {
        "rt-movie-meta-basic-rating": "21"
    },
    "taxonomies": {
            "rt-movie-genre": [
                28,
                27,
                29
            ],
            "rt-movie-language": [
                18
            ]
        }
}
```

**Response**
```json
{
    "ID": 179,
    "author": "1",
    "type": "rt-movie",
    "date": "2024-03-11 05:31:54",
    "date_gmt": "0000-00-00 00:00:00",
    "title": "Abhinav2",
    "content": "Test content",
    "excerpt": "",
    "status": "draft",
    "meta": {
        "rt-movie-meta-basic-rating": [
            "21"
        ]
    },
    "taxonomies": {
        "rt-movie-genre": [
            28,
            29,
            27
        ],
        "rt-movie-language": [
            18
        ]
    }
}
```

3. `GET` `rtml/v1/movie/<id>` | Get post by id.

**Response**
```json
{
    "ID": 179,
    "author": "1",
    "type": "rt-movie",
    "date": "2024-03-11 05:31:54",
    "date_gmt": "0000-00-00 00:00:00",
    "title": "Abhinav2",
    "content": "Test content",
    "excerpt": "",
    "status": "draft",
    "meta": {
        "rt-movie-meta-basic-rating": [
            "21"
        ]
    },
    "taxonomies": {
        "rt-movie-genre": [
            28,
            29,
            27
        ],
        "rt-movie-language": [
            18
        ]
    },
    "_links": {
        "wp:term": [
            {
                "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-genre/crime/"
            },
            {
                "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-genre/drama/"
            },
            {
                "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-genre/thriller/"
            },
            {
                "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-language/korean/"
            }
        ],
        "curies": [
            {
                "name": "wp",
                "href": "https://api.w.org/{rel}",
                "templated": true
            }
        ]
    }
}
```

4. `POST` `rtml/v1/movie/<id>` | Updates existing post of type `rt-movie`

**header**
```
Content-Type: application/json
Authorization: Basic cnRjYW1wOnBQdXMgVkl1TiBqWFFvIEFpZVAgbHV6ZiBaYWti
User-Agent: PostmanRuntime/7.36.3
Accept: */*
Cache-Control: no-cache
Postman-Token: d4391721-dad3-4774-8c30-9413be72c3b0
Host: abhinav-ramesh-belhekar.local
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 358
```

**body**
```json
{
    "title" : "Abhinav2",
    "content" : "Test content",
    "meta" : {
        "rt-movie-meta-basic-rating": "21"
    },
    "status" : "published",
    "taxonomies": {
            "rt-movie-genre": [
                28,
                27,
                29
            ],
            "rt-movie-language": [
                18
            ]
        }
}
```

**response**
```json
{
    "ID": 179,
    "author": "1",
    "type": "rt-movie",
    "date": "2024-03-11 05:39:54",
    "date_gmt": "2024-03-11 05:39:54",
    "title": "Abhinav2",
    "content": "Test content",
    "excerpt": "",
    "status": "published",
    "meta": {
        "rt-movie-meta-basic-rating": [
            "21"
        ]
    },
    "taxonomies": {
        "rt-movie-genre": [
            28,
            29,
            27
        ],
        "rt-movie-language": [
            18
        ]
    },
    "_links": {
        "wp:term": [
            {
                "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-genre/crime/"
            },
            {
                "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-genre/drama/"
            },
            {
                "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-genre/thriller/"
            },
            {
                "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-movie-language/korean/"
            }
        ],
        "curies": [
            {
                "name": "wp",
                "href": "https://api.w.org/{rel}",
                "templated": true
            }
        ]
    }
}
```

5. `DELETE` `rtml/v1/movie/<id>` | Deletes post

**Response**
```
"Sucessfully deleted post (ID: 179)"
```

1. `GET` `rtml/v1/person` 
    - Returns all the posts

```json
[
    {
        "ID": 5,
        "author": "1",
        "type": "rt-person",
        "date": "2023-06-14 13:37:08",
        "date_gmt": "2023-06-14 13:37:08",
        "title": "Robert Downey Jr.",
        "content": "<!-- wp:paragraph -->\n<p>dolor sit amet, consectetur 
        ....
        ....
        pellentesque laoreet. Vempt vehicula cursus&nbsp;",
        "excerpt": "Robert Downey Jr. has evolved into one of the most respected actors in Hollywood. With an amazing...",
        "status": "publish",
        "meta": {
            "rt-person-meta-basic-birth-date": [
                "1965-04-14"
            ],
            "rt-person-meta-basic-birth-place": [
                "48764 Howard Forge Apt. 421Vanessaside, VT 79393"
            ],
            "rt-person-meta-social-twitter": [
                "https://twitter.com/robertdowneyjr"
            ],
            "rt-person-meta-social-facebook": [
                "https://facebook.com/robertdowneyjr"
            ],
            "rt-person-meta-social-instagram": [
                "https://instagram.com/robertdowneyjr"
            ],
            "rt-person-meta-social-web": [
                "https://robertdowneyjr.com"
            ],
            "rt-person-meta-full-name": [
                "Robert John Downey Jr."
            ],
            "rt-media-meta-video": [
                "78"
            ]
        },
        "taxonomies": {
            "rt-person-career": [
                5
            ]
        },
        "_links": {
            "https://api.w.org/attachment": [
                {
                    "href": false,
                    "attributes": []
                }
            ],
            "https://api.w.org/term": [
                {
                    "href": "http://abhinav-ramesh-belhekar.local/wp-json/http://abhinav-ramesh-belhekar.local/rt-person-career/actor/",
                    "attributes": []
                }
            ]
        }
    },
```

2. `POST` `rtml/v1/person` | Creates a new post of type `rt-person`

**Header**
```
Content-Type: application/json
Authorization: Basic cnRjYW1wOnBQdXMgVkl1TiBqWFFvIEFpZVAgbHV6ZiBaYWti
User-Agent: PostmanRuntime/7.36.3
Accept: */*
Cache-Control: no-cache
Postman-Token: 858b6add-6965-46a4-88f8-0faf591afb1f
Host: abhinav-ramesh-belhekar.local
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 330
```

**Body**
```json
{
    "title" : "Abhinav Belhekar",
    "content" : "Temp",
    "meta" : {
        "rt-person-meta-basic-birth-place" : [
            "Junnar"
        ]
    }
}
```

**Response**
```json
{
    "ID": 180,
    "author": "1",
    "type": "rt-person",
    "date": "2024-03-11 05:47:55",
    "title": "Abhinav Belhekar",
    "content": "Temp",
    "excerpt": "",
    "status": "draft",
    "meta": {
        "rt-person-meta-basic-birth-place": [
            "Junnar"
        ]
    },
    "taxonomies": []
}
```

3. `GET` `rtml/v1/person/<id>` | Get post by id.

**Response**
```json
{
    "ID": 180,
    "author": "1",
    "type": "rt-person",
    "date": "2024-03-11 05:47:55",
    "title": "Abhinav Belhekar",
    "content": "Temp",
    "excerpt": "",
    "status": "draft",
    "meta": {
        "rt-person-meta-basic-birth-place": [
            "Junnar"
        ]
    },
    "taxonomies": []
}
```



4. `POST` `rtml/v1/person/<id>` | Updates existing post of type `rt-person`

**header**
```
Content-Type: application/json
Authorization: Basic cnRjYW1wOnBQdXMgVkl1TiBqWFFvIEFpZVAgbHV6ZiBaYWti
User-Agent: PostmanRuntime/7.36.3
Accept: */*
Cache-Control: no-cache
Postman-Token: d4391721-dad3-4774-8c30-9413be72c3b0
Host: abhinav-ramesh-belhekar.local
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 358
```

**body**
```json
{
    "title" : "Abhinav Belhekar",
    "content" : "Temp",
    "status" : "published"
}
```

**response**
```json
{
    "ID": 180,
    "author": "1",
    "type": "rt-person",
    "date": "2024-03-11 05:49:34",
    "date_gmt": "2024-03-11 05:49:34",
    "title": "Abhinav Belhekar",
    "content": "Temp",
    "excerpt": "",
    "status": "published",
    "meta": {
        "rt-person-meta-basic-birth-place": [
            "Junnar"
        ]
    },
    "taxonomies": []
}
```



10. `DELETE` `rtml/v1/person/<id>` | Deletes post

**Response**
```
"Sucessfully deleted post (ID: 180)"
```