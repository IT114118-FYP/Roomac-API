# User Permission


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
    




