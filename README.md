# Library API Documentation
## Introduction
The Library API enables easy digital library management, allowing users to browse and administrators to organize, view, add, and modify book and author collections. It supports role-based access with authentication, catalog browsing, and search features, making it ideal for integrating library functions into web or mobile applications.
## Endpoints
### Endpoint 1: User Registration
- **description:** The User Registration endpoint allows new users to create an account in the Library API. This endpoint collects essential information to set up a user profile, granting access based on defined user roles (e.g., general user or admin).
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
    "Message": "Email already taken! Try another one."
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
    "Message": "Access Denied. Only admins can update books."
  }
}
```
- **Invalid Token**
```json
 {
  "status": "fail",
  "data": {
    "Message": "Expired token"
  }
}
```
- **Database Error**
```json
{
    "status": "fail",
    "data": {
        "Message": "Database error message here."
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
    "Message": "Access Denied. Only admins can update books."
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
- **Invalid Token**
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
    "Message": "Access Denied. Only admins can delete books."
  }
}
```
- **Token Invalid**
```json
{
  "status": "fail",
  "data": {
    "Message": "Expired token"
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
- **Token Invalid**
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
    "Message": "Access Denied. Only admins can add authors."
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
- **Database Connection Error**
```json
{
  "status": "fail",
  "data": {
    "Message": "Database connection error."
  }
}
```
- **Unexpected Server Error**
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
    "title": "Access Denied. Only admins can update books."
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
- **Database Connection Error**
```json
{
  "status": "fail",
  "data": {
    "Message": "Database connection error."
  }
}
```

