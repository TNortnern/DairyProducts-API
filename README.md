# Dairy Products API Documentation

# Contents

* [Products](#products)
    * [Get all Products](#get-all-products)
    * [Create a Product](#create-a-product)
    * [Delete a Product](#delete-a-product)
    * [Update a Product](#update-a-product)
* [Categories](#categories)
    * [Get all Categories](#get-all-categories)
    * [Create a Category](#create-a-category)
    * [Delete a Category](#delete-a-category)
    * [Update a Category](#update-a-category)
* [Authentication](#authentication)
    * [Sign in](#sign-in)
    * [Sign up](#sign-up)
    * [Sign out](#sign-out)
* [Users](#users)
    * [Get a User](#get-a-user)
    * [Refresh a User Token](#refresh-a-user-token)
* [Sizes](#sizes)
    * [Get all Sizes](#get-all-sizes)
    * [Create a Size](#create-a-size)
    * [Update a Size](#update-a-size)
    * [Delete a Size](#delete-a-size)

# Products
*[Back to Top](#contents)*

## Get all products
*[Back to Top](#contents)*

* **URL**

    `/api/products`

* **Method**

    `GET`

* **URL Params**

    **Optional:**

    Retrieve a list of 10 products, supports pagination

    `page=[alphanumeric]`

* **Data Params**

    N/A

* **Success Response**

    * **Code**: ???

      **Content**: { ??? }

* **Error Response**

    * **Code**: ???

      **Content**: { ??? }

* **Example Call**

    ```
    $.ajax({
        ???
    })
    ```

## Create a Product
*[Back to Top](#contents)*

* **URL**

    `??`

* **Method**

    `POST`

* **URL Params**

    N/A

* **Data Params**

    **Required**:

    `name` | `data type` - The product name

    `imagename` | data type - The image, what image and is it a name?

    `category` | data type - The foreign key, categorises the table ID

    `description` | data type - Description of the product

    `size` | data type - What does this do? Foreign key to the `sizes` table ID

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ???
    })
    ```

## Delete a Product
*[Back to Top](#contents)*

* **URL**

    `/api/products/delete`

* **Method**

    `POST`

* **URL Params**

    N/A

* **Data Params**

    **Required**:

    `id` | `data type` - Id of the product to delete

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ???
    })

## Update a Product
*[Back to Top](#contents)*

* **URL**

    `/api/products/update`

* **Method**

    `POST`

* **URL Params**

    N/A

* **Data Params**

    **Required**:

    `id` | `data type` - Id of the product to delete

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ???
    })
    ```

# Categories
*[Back to Top](#contents)*

## Get all Categories
*[Back to Top](#contents)*

* **URL**

    `/api/categories`

* **Method**

    `GET`

* **URL Params**

    ??

* **Data Params**

    ??

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

## Create a Category
*[Back to Top](#contents)*

* **URL**

    `/api/categories/create`

* **Method**

    `POST`

* **URL Params**

    N/A

* **Data Params**

    **Required**:

    `catname` | `data type` - Name of the category

    `catdescription` | `data type` - Description for the category

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

## Delete a Category 
*[Back to Top](#contents)*

* **URL**

    `/api/categories/delete`

* **Method**

    `POST`

* **URL Params**

    N/A

* **Data Params**

    **Required**:

    `id` | `data type` - Id of the product to delete

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ??
    })

## Update a Category
*[Back to Top](#contents)*

* **URL**

    `/api/categories/update`

* **Method**

    `POST`

* **URL Params**

    N/A

* **Data Params**

    **Required**:

    ???

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

# Authentication
*[Back to Top](#contents)*

## Sign up
*[Back to Top](#contents)*

* **URL**

    `/api/signup`

* **Method**

    `POST`

* **URL Params**

    ???

* **Data Params**

    **Required**:

    ???

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

## Sign in
*[Back to Top](#contents)*

This will create and assign the user a token, this token will handle identifying logged in users but it expires after 24hours and will require a token refresh if you want to keep the user authenticated

* **URL**

    `/api/signin`

* **Method**

    `POST`

* **URL Params**

    ???

* **Data Params**

    **Required**:

    ???

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

## Sign out
*[Back to Top](#contents)*

* **URL**

    `/api/signout`

* **Method**

    `POST`

* **URL Params**

    ???

* **Data Params**

    **Required**:

    ???

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

# Users
*[Back to Top](#contents)*

## Get a user
*[Back to Top](#contents)*

* **URL**

    `/api/users/getAuthedUsers`

* **Method**

    `POST`

* **URL Params**

    ???

* **Data Params**

    **Required**:

    Bearer token ???

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

## Refresh a User Token
*[Back to Top](#contents)*

* **URL**

    `/api/users/refresh`

* **Method**

    `POST`

* **URL Params**

    ???

* **Data Params**

    **Required**:

    Bearer token ???

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

# Sizes
*[Back to Top](#contents)*

## Get all Sizes
*[Back to Top](#contents)*

* **URL**

    `/api/sizes`

* **Method**

    `GET`

* **URL Params**

    ???

* **Data Params**

    **Required**:

    ???

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

## Create a Size
*[Back to Top](#contents)*

* **URL**

    `/api/sizes/create`

* **Method**

    `POST`

* **URL Params**

    N/A

* **Data Params**

    **Required**:

    `size` | `data type` - List of sizes seperated by asterisks

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
        data: { size: 'M*L*XXL' }
    })

## Update a Size
*[Back to Top](#contents)*

* **URL**

    `/api/size/update`

* **Method**

    `POST`

* **URL Params**

    ???

* **Data Params**

    **Required**:

    `id` | `data type` - Id of the size to update
    What else?

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })

## Delete a Size
*[Back to Top](#contents)*

* **URL**

    `/api/sizes/delete`

* **Method**

    `POST`

* **URL Params**

    ???

* **Data Params**

    **Required**:

    `id` | `data type` - Id of the size to delete

* **Success Response**

    * **Code**: ???

      **Content**: { ?? }

* **Error Response**

    * **Code**: ???

      **Content**: { ?? }

* **Example Call**

    ```
    $.ajax({
        ...
    })