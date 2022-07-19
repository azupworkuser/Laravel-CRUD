FORMAT: 1A

# LaraCrud API

# Post [/posts]
Post

## List of Post [GET /posts]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Post [GET /posts/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Post

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Post]."
            }

## Create a Post [POST /posts/store]


+ Request (application/json)
    + Body

            {
                "user_id": "required|exists:users,id|numeric",
                "title": "nullable|max:255",
                "slug": "nullable|unique:posts,slug|max:255",
                "status": "required|in:draft,published,canceled",
                "body": "nullable|string",
                "category_id": "nullable|exists:categories,id|numeric",
                "image": "nullable|file",
                "published_at": "nullable|date",
                "total_view": "required|numeric"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Post"
            }

## Update a existing Post [PUT /posts/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Post

+ Request (application/json)
    + Body

            {
                "user_id": "required|exists:users,id|numeric",
                "title": "nullable|max:255",
                "slug": "nullable|unique:posts,slug|max:255",
                "status": "required|in:draft,published,canceled",
                "body": "nullable|string",
                "category_id": "nullable|exists:categories,id|numeric",
                "image": "nullable|file",
                "published_at": "nullable|date",
                "total_view": "required|numeric"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Post]."
            }

## Delete an existing Post [DELETE /posts/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Post

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Post successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Post]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Post"
            }

# Comment [/comments/{post}]
Comment

## List of Comment [GET /comments/{post}]


+ Parameters
    + post: (integer, required) - The primary key of post
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": []
            }

## Show details about a Comment [GET /comments/{post}/{id}]


+ Parameters
    + post: (integer, required) - The primary key of post
    + id: (integer, required) - The primary key of Comment

+ Response 200 (application/json)
    + Body

            {
                "data": []
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Comment]."
            }

## Create a Comment [POST /comments/{post}/store]


+ Parameters
    + post: (integer, required) - The primary key of post

+ Request (application/json)
    + Body

            {
                "user_id": "required|exists:users,id|numeric",
                "post_id": "required|exists:posts,id|numeric",
                "body": "nullable|string"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Comment"
            }

## Update a existing Comment [PUT /comments/{post}/{id}]


+ Parameters
    + post: (integer, required) - The primary key of post
    + id: (integer, required) - The primary key of Comment

+ Request (application/json)
    + Body

            {
                "user_id": "required|exists:users,id|numeric",
                "post_id": "required|exists:posts,id|numeric",
                "body": "nullable|string"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Comment]."
            }

## Delete an existing Comment [DELETE /comments/{post}/{id}]


+ Parameters
    + post: (integer, required) - The primary key of post
    + id: (integer, required) - The primary key of Comment

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Comment successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Comment]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Comment"
            }

# Category [/categories]
Category

## List of Category [GET /categories]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Category [GET /categories/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Category

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Category]."
            }

## Create a Category [POST /categories/store]


+ Request (application/json)
    + Body

            {
                "parent_id": "nullable|max:255",
                "title": "nullable|max:255",
                "slug": "required|unique:categories,slug|max:255"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Category"
            }

## Update a existing Category [PUT /categories/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Category

+ Request (application/json)
    + Body

            {
                "parent_id": "nullable|max:255",
                "title": "nullable|max:255",
                "slug": "required|unique:categories,slug|max:255"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Category]."
            }

## Delete an existing Category [DELETE /categories/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Category

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Category successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Category]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Category"
            }

# Tag [/tags]
Tag

## List of Tag [GET /tags]


+ Parameters
    + page: (integer, optional) - The page of results to view.
        + Default: 1

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    [
                        []
                    ]
                ]
            }

## Show details about a Tag [GET /tags/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Tag

+ Response 200 (application/json)
    + Body

            {
                "data": [
                    []
                ]
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Tag]."
            }

## Create a Tag [POST /tags/store]


+ Request (application/json)
    + Body

            {
                "slug": "required|max:255",
                "name": "nullable|max:150"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while saving Tag"
            }

## Update a existing Tag [PUT /tags/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Tag

+ Request (application/json)
    + Body

            {
                "slug": "required|max:255",
                "name": "nullable|max:150"
            }

+ Response 200 (application/json)
    + Body

            []

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Tag]."
            }

## Delete an existing Tag [DELETE /tags/{id}]


+ Parameters
    + id: (integer, required) - The primary key of Tag

+ Response 200 (application/json)
    + Body

            {
                "status": 200,
                "message": "Tag successfully deleted"
            }

+ Response 404 (application/json)
    + Body

            {
                "message": "No query results for model [Blog\Models\Tag]."
            }

+ Response 500 (application/json)
    + Body

            {
                "message": "Error occurred while deleting Tag"
            }