# Users


## Get myself

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/users/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/me"
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
    "id": 2,
    "name": "190189768",
    "email": "190189768@stu.vtc.edu.hk",
    "program_id": "CE114301",
    "branch_id": "CW",
    "first_name": "Pui Tat",
    "last_name": "Tse",
    "chinese_name": "謝沛達",
    "created_at": "2020-10-28T04:37:56.000000Z",
    "updated_at": "2020-10-28T04:37:56.000000Z",
    "deleted_at": null
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/users/me`**



## List users

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users"
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
 **`api/users`**



## Create a user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users"
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
 **`api/users`**



## Get a user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/users/{user}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/{user}"
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
 **`api/users/{user}`**



## Update a User

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/users/{user}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/{user}"
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
 **`api/users/{user}`**

<small class="badge badge-purple">PATCH</small>
 **`api/users/{user}`**



## Delete a User

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/users/{user}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/{user}"
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
 **`api/users/{user}`**



## Get a user&#039;s permissions

Retrieve all permissions associated with the user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/users/{user}/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/{user}/permissions"
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
        "name": "create:roles",
        "granted": true,
        "role": null
    },
    {
        "name": "update:roles",
        "granted": true,
        "role": null
    },
    {
        "name": "delete:roles",
        "granted": false,
        "role": null
    },
    {
        "name": "grant:roles",
        "granted": false,
        "role": null
    },
    {
        "name": "revoke:roles",
        "granted": false,
        "role": null
    },
    {
        "name": "create:programs",
        "granted": true,
        "role": "Custom Create"
    },
    {
        "name": "update:programs",
        "granted": true,
        "role": null
    },
    {
        "name": "delete:programs",
        "granted": false,
        "role": null
    },
    {
        "name": "create:branches",
        "granted": true,
        "role": "Custom Create"
    },
    {
        "name": "update:branches",
        "granted": false,
        "role": null
    },
    {
        "name": "delete:branches",
        "granted": false,
        "role": null
    },
    {
        "name": "create:users",
        "granted": true,
        "role": "Custom Create"
    },
    {
        "name": "update:users",
        "granted": true,
        "role": "User Admin"
    },
    {
        "name": "delete:users",
        "granted": true,
        "role": "User Admin"
    },
    {
        "name": "grant:permissions",
        "granted": false,
        "role": null
    },
    {
        "name": "revoke:permissions",
        "granted": false,
        "role": null
    }
]
```

### Request
<small class="badge badge-green">GET</small>
 **`api/users/{user}/permissions`**



## Update permissions from a user

Update permissions from a user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/users/{user}/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"create:roles":true,"update:roles":true,"delete:roles":true}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/{user}/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "create:roles": true,
    "update:roles": true,
    "delete:roles": true
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200, success):

```json
[
    {
        "name": "create:roles",
        "granted": true,
        "role": null
    },
    {
        "name": "update:roles",
        "granted": true,
        "role": null
    },
    {
        "name": "delete:roles",
        "granted": false,
        "role": null
    },
    {
        "name": "grant:roles",
        "granted": false,
        "role": null
    },
    {
        "name": "revoke:roles",
        "granted": false,
        "role": null
    },
    {
        "name": "create:programs",
        "granted": true,
        "role": "Custom Create"
    },
    {
        "name": "update:programs",
        "granted": true,
        "role": null
    },
    {
        "name": "delete:programs",
        "granted": false,
        "role": null
    },
    {
        "name": "create:branches",
        "granted": true,
        "role": "Custom Create"
    },
    {
        "name": "update:branches",
        "granted": false,
        "role": null
    },
    {
        "name": "delete:branches",
        "granted": false,
        "role": null
    },
    {
        "name": "create:users",
        "granted": true,
        "role": "Custom Create"
    },
    {
        "name": "update:users",
        "granted": true,
        "role": "User Admin"
    },
    {
        "name": "delete:users",
        "granted": true,
        "role": "User Admin"
    },
    {
        "name": "grant:permissions",
        "granted": false,
        "role": null
    },
    {
        "name": "revoke:permissions",
        "granted": false,
        "role": null
    }
]
```
> Example response (401, not_exist):

```json
{
    "not_exist": [
        "create:roless",
        "update:rolex"
    ]
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/users/{user}/permissions`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>create:roles</b></code>&nbsp; <small>boolean</small>         <i>optional</i>    <br>
    

<code><b>update:roles</b></code>&nbsp; <small>boolean</small>         <i>optional</i>    <br>
    

<code><b>delete:roles</b></code>&nbsp; <small>boolean</small>         <i>optional</i>    <br>
    




