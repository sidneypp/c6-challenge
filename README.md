# PHP CHALLENGE

Your customer receives two XML models from his partner. This information must be available for both web system and mobile app.

### The Challenge

Create a Symfony2 application to manually upload the given XMLs and have an option to process them. Make the processed information available via rest APIs.

### Must have

-   Symfony2, doctrine, composer, mysql. ✅
-   An index page to upload the XML with a button to process it.
-   Rest APIs for the XML data, only the GET methods are needed. ✅
-   README.md with the instructions to install the application (docker is a plus here :) ) ✅

### Bonus points

-   Drag and drop upload component.
-   Authentication method to the APIs. ✅
-   Generated documentation for the APIs. ✅
-   Unit/Functional tests.

## Installation and Setup

-   Clone or download this repository
-   Run `composer install` to install all the dependencies
-   Run `docker-compose build` to build the php image
-   Run `docker-compose up -d` to 
-   Run `php bin/console doctrine:migrations:migrate` to create the tables
-   Finally run `php bin/console doctrine:fixtures:load` to seeds the users table with one user to test the authentication
-   Update your system host file(in mac run `sudo vim /etc/hosts`) and add `127.0.0.1 mysql`
-   If everything worked correctly, you can navigate to `http://localhost:8080/` 🚀

## API Documentation

### Auth

#### [POST] `/api/auth`

Use this endpoint to login and receive the authorization token which is necessary to send with every other request to this API

> Send a JSON with username and password. You can test it with _invillia_ and _invillia_

### Person

#### [POST] `/api/person`

Use this endpoint to add new people

-   Request example:

    [People.xml](examples/people.xml)
-   Response example:

```json
[
  {
    "id": 1,
    "personid": 1,
    "personname": "Name 1",
    "phones": [
      {
        "id": 1,
        "phone": "2345678",
        "person": 1,
        "createdAt": "2020-02-03 20:33:15"
      },
      {
        "id": 2,
        "phone": "1234567",
        "person": 1,
        "createdAt": "2020-02-03 20:33:15"
      }
    ],
    "createdAt": "2020-02-03 20:33:15"
  },
  {
    "id": 2,
    "personid": 2,
    "personname": "Name 2",
    "phones": [
      {
        "id": 3,
        "phone": "4444444",
        "person": 2,
        "createdAt": "2020-02-03 20:33:15"
      }
    ],
    "createdAt": "2020-02-03 20:33:15"
  },
  {
    "id": 3,
    "personid": 3,
    "personname": "Name 3",
    "phones": [
      {
        "id": 4,
        "phone": "7777777",
        "person": 3,
        "createdAt": "2020-02-03 20:33:15"
      },
      {
        "id": 5,
        "phone": "8888888",
        "person": 3,
        "createdAt": "2020-02-03 20:33:15"
      }
    ],
    "createdAt": "2020-02-03 20:33:15"
  }
] 
```

#### [GET] `/api/person`

Use this endpoint to get a collection of people

-   Response example:

```json
[
    {
    "id": 1,
    "personid": 1,
    "personname": "Name 1",
    "phones": [
      {
        "id": 56,
        "phone": "2345678",
        "person": 61,
        "createdAt": "2020-02-03 19:58:04"
      },
      {
        "id": 57,
        "phone": "1234567",
        "person": 61,
        "createdAt": "2020-02-03 19:58:04"
      }
    ],
    "createdAt": "2020-02-03 19:58:04"
    },
    {
      "id": 62,
      "personid": 2,
      "personname": "Name 2",
      "phones": [
        {
          "id": 58,
          "phone": "4444444",
          "person": 62,
          "createdAt": "2020-02-03 19:58:04"
        }
      ],
      "createdAt": "2020-02-03 19:58:04"
    }
]
```

#### [GET] `/api/person/{id}`

Use this endpoint to get information about a specific person using its id

-   Response example:

```json
{
  "id": 1,
  "personid": 1,
  "personname": "Name 1",
  "phones": [
    {
      "id": 121,
      "phone": "2345678",
      "person": 100,
      "createdAt": "2020-02-03 20:23:43"
    },
    {
      "id": 122,
      "phone": "1234567",
      "person": 100,
      "createdAt": "2020-02-03 20:23:43"
    }
  ],
  "createdAt": "2020-02-03 20:23:42"
}
```
