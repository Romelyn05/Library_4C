# Library API Documentation
## Introduction
The Library API provides a system for managing a digital library. It allows users to browse the catalog and enables administrators to organize, view, add, and modify book and author collections. The API supports role-based access control with authentication, catalog browsing, and search features, making it ideal for integrating library functions into web or mobile applications.
## Endpoints
### Endpoint 1: User Registration
- **description:** This endpoint allows new users to create an account in the Library API. It collects essential information to set up a user profile and grants access based on defined roles (e.g., general user or admin).
- **url:** users/register
- **method:** POST
### Example Request
```json
{
 "email": "romelyn@gmail.com",
 "username": "romi",
 "password": "1234"
}
```
**Success Response**
```json
{
  "status": "success",
  "data": null
}
```
**Error Response**
- **Missing Fields**
```json
{
  "status": "fail",
  "data": {
    "Message": "Fields cannot be empty."
  }
}
```
- **Email Already Exists**
```json
{
  "status": "fail",
  "data": {
    "Message": "Email already exists."
  }
}
```
- **Registration Failure**
```json
{
    "status": "fail",
    "data": {
        "Message": "Registration failed."
    }
}
```
### Endpoint 2: User login
- **description:** The User Login endpoint authenticates existing users by verifying their email and password. Upon successful login, the endpoint returns an authentication token that allows users to securely access the Library API’s protected resources.
- **url:** users/login
- **method:** POST
### Example Request
```json
{
  "email": "romelyn@gmail.com",
  "password": "1234"
}
```
**Success response**
```json
{
  "status": "success",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTg2NjMsImV4cCI6MTczMDk2NTg2MywiZGF0YSI6eyJ1c2VyaWQiOiI0MyIsIm5hbWUiOiJyb21pIiwiYWNjZXNzX2xldmVsIjoiIn19.g2FsCgrXzSQgLcSRzHDFxZIEcTabDwMKXAPxSb1WCPg"
}
```
**Error Response**
- **Access Denied**
 ```json
{
  "status": "fail",
  "data": {
    "Message": "Access Denied."
  }
}
```
- **Invalid Credentials**
```json
 {
  "status": "fail",
  "data": {
    "Message": "Invalid email or password"
  }
}
```
- **Login Failure**
```json
{
    "status": "fail",
    "data": {
        "Message": "Login failed."
    }
}
```
### Endpoint 3: Books Add
- **description:** The Add Book endpoint allows administrators to add a new book to the Library API’s collection. This endpoint requires authentication, and only users with the appropriate permissions (e.g., admin role) can add books.
- **url:** books/add
- **method:** POST
### Example Request
```json
{
  "author":"Romelyn",
  "title": "Love triangle",
  "genre": "romcom",
  "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTk0MDgsImV4cCI6MTczMDk2MzAwOCwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJhZG1pbiIsImFjY2Vzc19sZXZlbCI6ImFkbWluIn19.8FYtbWnuZi5S8KChTay7htTmf6qRTaGxXWl-ZUpu-sg"
}
```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5NTk0MjEsImV4cCI6MTczMDk2MzAyMSwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.XSGjnl6_S8TqTdBKYFzhj15tc6qHGplVHPazb2CnZmY"
}
```
**Error Response**
- **Access Denied**
 ```json
{
  "status": "fail",
  "data": {
    "Message": "Access Denied."
  }
}
```
- **Invalid Token or outdated**
```json
 {
  "status": "fail",
  "data": {
    "Message": "Token is invalid or outdated"
  }
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
### Endpoint 4: Books Update
- **description:** The Update Book endpoint allows authorized administrators to modify details of an existing book within the Library API.
- **url:** books/update
- **method:** POST
### Example Request
```json
{
  "bookCode": "115UO",
  "author": "Romelyn",
  "title": "Love",
  "genre": "Romance",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3Mjk0Nzc1MzgsImV4cCI6MTcyOTQ4MTEzOCwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.9a_p_kWwem2WwgskiSvZjSniQ9QzdTijiRFkDYsEvsQ"
}
```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzA5ODQ3ODIsImV4cCI6MTczMDk4ODM4MiwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.k5sRzBTA3dCog-Dr6jWpshBdXNDDdY00BDg0d_hohiY"
}
```
**Error Response**
- **Access Denied**
```json
{
  "status": "fail",
  "data": {
    "Message": "Access Denied."
  }
}
```
- **Invalid Book Code**
 ```json
 {
  "status": "fail",
  "data": {
    "Message": "Invalid Book Code."
  }
}
 ```
- **Invalid Token or outdated**
```json
{
  "status": "fail",
  "data": {
    "Message": "Token is invalid or outdated."
  }
}
```
- **No Fields to update**
```json
{
    "status": "fail",
    "data": {
        "Message": "No fields to update."
    }
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
### Endpoint 5: Books Delete
- **description:** The Delete Book endpoint allows authorized administrators to remove a book from the Library API’s collection. This endpoint is designed to permanently delete book records, ensuring that outdated or incorrect information is removed from the library database.
- **url:** books/delete
- **method:** DELETE
### Example Request
```json
{
  "bookCode": "115UO",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3Mjk0Nzc2NDksImV4cCI6MTcyOTQ4MTI0OSwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.a9XuhHqDjbsrr3LzZT4tSySXzA2lHPcHPPqIYSk00-c"
}
```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzEzNzY4MzksImV4cCI6MTczMTM4MDQzOSwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.iMcFAM9nbZOXncV_jDAzsqgh7za3izNDo2TtcPv6gIw"
}
```
**Error Response**
- **Access Denied**
```json
{
  "status": "fail",
  "data": {
    "Message": "Access Denied."
  }
}
```
- **Token Invalid or outdated**
```json
{
  "status": "fail",
  "data": {
    "Message": "Token is invalid or outdated"
  }
}
```
- **Invalid Book Code**
```json
{
  "status": "fail",
  "data": {
    "Message": "Invalid Book Code."
  }
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```

### Endpoint 6: Books DisplayAll
- **description:** The Display All Books endpoint allows users to retrieve a list of all books in the Library API’s collection. 
- **url:** books/displayAll
- **method:** GET
### Example Request
```json
{
  "token" : "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3Mjk0Nzc2MzMsImV4cCI6MTcyOTQ4MTIzMywiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.0nhw0-eCYPndq2_XnpA8VfpkHbU_jf5QJlYPyYyImJc"
}
```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzEzNzgxNjEsImV4cCI6MTczMTM4MTc2MSwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0._LD3vCZph68qtWghMf52DcykzbpC8A5i9IB0oZ27tB4",
  "data": [
    {
      "bookid": "17",
      "title": "Disguise Affection",
      "genre": "Romantic",
      "bookCode": "591IJ",
      "authorid": "14",
      "authorname": "Romelyn Celebrados"
    },
    {
      "bookid": "29",
      "title": "Lust",
      "genre": "Romantic",
      "bookCode": "581HS",
      "authorid": "14",
      "authorname": "Romelyn Celebrados"
    }
  ]
}
```
**Error Response**
- **Token Invalid or outdated**
```json
{
  "status": "fail",
  "data": {
    "title": "Expired token"
  }
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
### Endpoint 7: Authors Add
- **description:** The Add Author endpoint allows administrators to add a new author to the library database. 
- **url:** /authors/update
- **method:** POST
### Example Request
```json
{
  "authorname": "Romelyn Celebrados",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE0MjA5MDcsImV4cCI6MTczMTQyODEwNywiZGF0YSI6eyJ1c2VyaWQiOiI0MyIsIm5hbWUiOiJyb21pIiwiYWNjZXNzX2xldmVsIjoiIn19.u4oAdXfwZOitYxGzgQdFwGn60VKo_74SyTt4dHNlKvk"
}
```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzEzNzkzMzUsImV4cCI6MTczMTM4MjkzNSwiZGF0YSI6eyJ1c2VyaWQiOiI0MyIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiIn19.an1JwwFS5SjHUpJIqCqIwI_H5iMzntJR1_r2U_Mn7pk",
  "data": [
    {
      "bookid": "17",
      "title": "Disguise Affection",
      "genre": "Romantic",
      "bookCode": "591IJ",
      "authorid": "14",
      "authorname": "Romelyn Celebrados"
    },
    {
      "bookid": "35",
      "title": "Lust",
      "genre": "Romantic",
      "bookCode": "167PY",
      "authorid": "14",
      "authorname": "Romelyn Celebrados"
    }
  ]
}
```
**Error Response**
- **Access Denied**
```json
{
  "status": "fail",
  "data": {
    "Message": "Access Denied."
  }
}
```
- **Duplicate Author**
```json
{
  "status": "fail",
  "data": {
    "Message": "Author already exists."
  }
}

```
- **Token is Invalid or Outdated**
```json
{
  "status": "fail",
  "data": {
    "Message": "Token is invalid or outdated."
  }
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
- **Server Error**
```json
{
  "status": "fail",
  "data": {
    "Message": "An unexpected error occurred."
  }
}
```
### Endpoint 8: Authors Update
- **description:** This endpoint allows an administrator to update author details in the library database, specifically the author’s name. 
- **url:** /authors/update
- **method:** POST
### Example Request
```json
{
 {
  "authorid": "17",
  "authorname": "romelyn",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE0NTYxODIsImV4cCI6MTczMTQ1OTc4MiwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJhZG1pbiIsImFjY2Vzc19sZXZlbCI6ImFkbWluIn19.NN2yNh385uuD0ASrk_NVoFiZcWtfF1TNVQdidu_1zKk"
}
```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE0NTYyMzUsImV4cCI6MTczMTQ1OTgzNSwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.Fbx8cvmJtzJM0j6UBYC-Jm1YF7GSjGarDitQseewbjI"
}
```
**Error Response**
- **Access Denied**
```json
{
  "status": "fail",
  "data": {
    "title": "Access Denied."
  }
}
```
- **Invalid Author ID**
```json
{
  "status": "fail",
  "data": {
    "Message": "Invalid Author ID."
  }
}

```
- **No Field to Update**
```json
{
  "status": "fail",
  "data": {
    "Message": "No fields to update."
  }
}
```
- **Token is invalid or Outdated**
```json
{
  "status": "fail",
  "data": {
    "Message": "Token is invalid or outdated."
  }
}

```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
### Endpoint 9: Authors Delete
- **description:** This endpoint allows an administrator to delete an author from the library database. The endpoint requires a valid JWT token with admin privileges to ensure only authorized users can perform the deletion.
- **url:** /authors/delete
- **method:** DELETE
### Example Request
```json
{
 {
  "authorid": "17",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE0NTYxODIsImV4cCI6MTczMTQ1OTc4MiwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJhZG1pbiIsImFjY2Vzc19sZXZlbCI6ImFkbWluIn19.NN2yNh385uuD0ASrk_NVoFiZcWtfF1TNVQdidu_1zKk"
}
```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE0NTczMDUsImV4cCI6MTczMTQ2MDkwNSwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.QiAxMOSOoNG9p0b3xim9l5Cq1PxQd_EdZf-HlMBzznU"
}
```
**Error Response**
- **Access Denied**
```json
{
  "status": "fail",
  "data": {
    "Message": "Access Denied."
  }
}
```
- **Invalid Author ID**
```json
{
  "status": "fail",
  "data": {
    "Message": "Invalid Author ID."
  }
}
```
- **Token is Invalid or Outdated**
```json
{
  "status": "fail",
  "data": {
    "Message": "Token is invalid or outdated."
  }
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
### Endpoint 10: Authors DisplayAllAuthors
- **description:** This endpoint allows an authenticated user to view all authors in the library database. A new JWT token is generated upon each successful request to ensure token freshness.
- **url:** /authors/displayAllAuthors
- **method:** GET
### Example Request
```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE0NTg0NDcsImV4cCI6MTczMTQ2MjA0NywiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJhZG1pbiIsImFjY2Vzc19sZXZlbCI6ImFkbWluIn19.TzmAFJK9H2qGd5KENjZm4L7QSC84Q2Kuk2LmaXhV1tc"
}

```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE0NTg0NjAsImV4cCI6MTczMTQ2MjA2MCwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.s8vWc5kLZWMH5LIYZpWuF-AOl3qMFAuz9WFlpxCovo0",
  "data": [
    {
      "authorid": "14",
      "authorname": "Romelyn Celebrados"
    },
    {
      "authorid": "18",
      "authorname": "John Doe"
    }
  ]
}
```
**Error Response**
- **Token Invalid or Outdated**
```json
{
  "status": "fail",
  "data": {
    "Message": "Token is invalid or outdated."
  }
}
```
- **No Authors Found**
```json
{
  "status": "fail",
  "Message": "No authors found."
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
### Endpoint 11: Users Delete
- **description:** This endpoint allows an admin user to delete a non-admin user account from the system.
- **url:** /users/delete
- **method:** DELETE
### Example Request
```json
{
    "userid": "48", 
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE0OTgwNjMsImV4cCI6MTczMTUwMTY2MywiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJhZG1pbiIsImFjY2Vzc19sZXZlbCI6ImFkbWluIn19.O5rgJygu6ZaYMXIfbxKVmk_9u2lkhXr49godMSdAxxk"
}

```
**Success Response**
```json
{
  "status": "success",
  "message": "User deleted successfully."
}
```
**Error Response**
- **Access Denied**
```json
{
  "status": "fail",
  "data": {
    "title": "Access Denied."
  }
}
```
- **User Not Found**
```json
{
  "status": "fail",
  "data": {
    "Message": "User not found."
  }
}
```
- **Admin Account Deletion Not Allowed**
```json
{
  "status": "fail",
  "data": {
    "Message": "Admin accounts cannot be deleted."
  }
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
 ### Endpoint 11: Users DisplayAll
- **description:** This endpoint allows an admin user to retrieve all non-sensitive details (such as username, email, and creation date) of users in the system.
- **url:** /users/displayAll
- **method:** GET
### Example Request
```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE1MDA2MTMsImV4cCI6MTczMTUwNDIxMywiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJhZG1pbiIsImFjY2Vzc19sZXZlbCI6ImFkbWluIn19.dkcbGzLowkeO1vJ0PpnAUDVX-fqtZdVjySxA8K9xWVE"
}
```
**Success Response**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE1MDA2MzAsImV4cCI6MTczMTUwNDIzMCwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJyb290IiwiYWNjZXNzX2xldmVsIjoiYWRtaW4ifX0.LUVLdzqIac0mzo2wCnl3lHzZPalaXZHdHX_wEJYicW4",
  "data": [
    {
      "username": "admin",
      "email": "admin@gmail.com",
      "created_at": "2024-11-13 20:23:33"
    },
    {
      "username": "romi",
      "email": "romelyn@gmail.com",
      "created_at": "2024-11-13 19:40:03"
    }
  ]
}
```
**Error Response**
- **Access Denied**
```json
{
  "status": "fail",
  "data": {
    "Message": "Access Denied."
  }
}
```
- **Token Invalid or Outdated**
```json
{
  "status": "fail",
  "data": {
    "Message": "Token is invalid or outdated."
  }
}
```
- **No users Found**
```json
{
  "status": "success",
  "new_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGlicmFyeS5vcmciLCJhdWQiOiJodHRwOi8vbGlicmFyeS5jb20iLCJpYXQiOjE3MzE1MDA5NTIsImV4cCI6MTczMTUwNDU1MiwiZGF0YSI6eyJ1c2VyaWQiOiI0MiIsIm5hbWUiOiJhZG1pbiIsImFjY2Vzc19sZXZlbCI6ImFkbWluIn19.yKxvcL65QyFC-05DC-2nBP519y6wDn3lLfrozfVYI8U",
  "Message": "No user account found."
}

```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Error message from the database."
    }
}
```
