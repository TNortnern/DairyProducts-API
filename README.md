Dairy Products API Documentation

**Products**

ep(endpoint): /api/products

Getting all Products

GET ep

This will return a list of products, paginated, 10 per page

You can specify the page number as a param e.g.

GET ('url/api/products?page=#')

Creating a Product

POST ep

Required fields are

Product name as *name* 

Image as *imagename* 

Category as *category* (foreign key to categories table id)

description as *description* 

sizes  as *size* (foreign key to sizes table id)

POST ('ep/delete')

*id* required

POST ('ep/update')

*id* required

**Categories**

ep(endpoint): /api/categories

Getting all Categories

GET ep

This will return a list of categories

Creating a Category

POST ep

Required fields are

Category name as *catname*

description as *catdescription* 

POST ('ep/delete')

*id* required

POST ('ep/update')

*id* required

**Authentication**

Signing up

POST ('url/api/signup')

Signing in

POST ('url/api/signin')

This will create and assign the user a token, this token will handle identifying logged in users but it expires after 24hours and will require a token refresh if you want to keep the user authenticated

Signing Out

POST ('url/api/signout')

getting user by token

POST ('url/api/users/getAuthedUser')

*Bearer Token required*

This will give you all details about a user except the password and id should the user be authenticated

refreshing the token

POST ('url/api/users/refresh')

*Bearer Token required*

**Sizes**

ep: ('url/api/sizes')

GET ep

Returns a list of all sizes

Creating a new size blueprint

POST ep/create

Required fields are

sizes as *size*(note: sizes are expected to come in seperated by asteriks e.g. S * M * L * XL, with no spaces between the asteriks)


Update a size blueprint

POST ep/delete

*id* is required

POST ep/update

*id* is required