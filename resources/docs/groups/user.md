# User


## Retrieve me

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/user/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/user/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200, success):

```json
{
    "id": 1,
    "name": "190189768",
    "email": "190189768@stu.vtc.edu.hk",
    "permission": "1",
    "program_id": "IT114118",
    "campus_id": "ST",
    "first_name": "Tat",
    "last_name": "Chan",
    "chinese_name": "何世",
    "created_at": "2020-10-07T17:44:37.000000Z",
    "updated_at": "2020-10-09T06:31:23.000000Z",
    "deleted_at": null
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/user/me`**



## Retrieve all Users

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200, success):

```json
[
    {
        "id": 1,
        "name": "190189768",
        "email": "190189768@stu.vtc.edu.hk",
        "permission": "1",
        "program_id": "IT114118",
        "campus_id": "ST",
        "first_name": "Tat",
        "last_name": "Chan",
        "chinese_name": "何世",
        "created_at": "2020-10-07T17:44:37.000000Z",
        "updated_at": "2020-10-09T06:31:23.000000Z",
        "deleted_at": null
    },
    {
        "id": 6,
        "name": "190271174",
        "email": "190271174@stu.vtc.edu.hk",
        "permission": "1",
        "program_id": "IT114118",
        "campus_id": "ST",
        "first_name": "Wing Kit",
        "last_name": "To",
        "chinese_name": "CHinese name",
        "created_at": "2020-10-09T06:42:02.000000Z",
        "updated_at": "2020-10-09T06:42:02.000000Z",
        "deleted_at": null
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/user`**



## Add a User

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/user`**



## Retrieve a User

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/user/{user}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/user/{user}"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/user/{user}`**



## Update a User

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/user/{user}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/user/{user}"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/user/{user}`**

<small class="badge badge-purple">PATCH</small>
 **`api/user/{user}`**



## Remove a User

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/user/{user}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/user/{user}"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-red">DELETE</small>
 **`api/user/{user}`**




