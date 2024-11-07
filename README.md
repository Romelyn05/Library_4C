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
