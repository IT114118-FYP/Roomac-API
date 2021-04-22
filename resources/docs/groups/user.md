# User


## Get myself bookings

Get current account bookings.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/users/me/bookings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/me/bookings"
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
 **`api/users/me/bookings`**



## Get myself

Get current account informations with permissions.

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
    "created_at": "2020-11-01T09:00:22.000000Z",
    "updated_at": "2020-11-01T09:00:22.000000Z",
    "deleted_at": null,
    "permissions": [
        {
            "name": "login:admin",
            "granted": true,
            "role": "root"
        },
        {
            "name": "create:roles",
            "granted": true,
            "role": "root"
        },
        {
            "name": "update:roles",
            "granted": true,
            "role": "root"
        },
        {
            "name": "delete:roles",
            "granted": true,
            "role": "root"
        },
        {
            "name": "grant:roles",
            "granted": true,
            "role": "root"
        },
        {
            "name": "revoke:roles",
            "granted": true,
            "role": "root"
        },
        {
            "name": "create:programs",
            "granted": true,
            "role": "root"
        },
        {
            "name": "update:programs",
            "granted": true,
            "role": "root"
        },
        {
            "name": "delete:programs",
            "granted": true,
            "role": "root"
        },
        {
            "name": "create:branches",
            "granted": true,
            "role": "root"
        },
        {
            "name": "update:branches",
            "granted": true,
            "role": "root"
        },
        {
            "name": "delete:branches",
            "granted": true,
            "role": "root"
        },
        {
            "name": "create:users",
            "granted": true,
            "role": "root"
        },
        {
            "name": "update:users",
            "granted": true,
            "role": "root"
        },
        {
            "name": "delete:users",
            "granted": true,
            "role": "root"
        },
        {
            "name": "grant:permissions",
            "granted": true,
            "role": "root"
        },
        {
            "name": "revoke:permissions",
            "granted": true,
            "role": "root"
        }
    ]
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/users/me`**



## Update myself avatar

Update current account avatar.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/users/me/avatar" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "image=@C:\Users\hkdse\AppData\Local\Temp\php9C80.tmp" 
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/me/avatar"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/users/me/avatar`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>image</b></code>&nbsp; <small>file</small>         <i>optional</i>    <br>
    



## Update myself password

Update current account password.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/users/me/password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"old_password":"aut","new_password":"sed"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/me/password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "aut",
    "new_password": "sed"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/users/me/password`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>old_password</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>new_password</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    



## Import users

Import users.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/users/import" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "file=@C:\Users\hkdse\AppData\Local\Temp\phpAAAA.tmp" 
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/import"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('file', document.querySelector('input[name="file"]').files[0]);

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/users/import`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>file</b></code>&nbsp; <small>file</small>     <br>
    



## Export users

Export users.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/users/export?format=csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/export"
);

let params = {
    "format": "csv",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
 **`api/users/export`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>format</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    Define the export format. Accepted: xlsx, csv, tsv, ods, xls, html. Defaults to xlsx.



## Remove multiple users

Remove multiple users.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"ids":"{\"ids\": [1, 2]}"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": "{\"ids\": [1, 2]}"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-red">DELETE</small>
 **`api/users`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>ids</b></code>&nbsp; <small>array</small>     <br>
    Array of the users' id



## Reset users

Remove all users.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/users/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/users/reset"
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
 **`api/users/reset`**



## Retrieve all users

Retrieve all users.

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
        "branch_id": "ST",
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
        "branch_id": "ST",
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



## Add a user

Add a user.

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



## Retrieve a user

Retrieve a user.

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



## Update a user

Update a user.

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



## Remove a user

Remove a user.

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




