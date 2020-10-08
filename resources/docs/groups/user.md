# User


## Create a User

⚠️ Admin Level 1, 2 required (1 - Root Admin | 2 - Campus Admin), 
also Campus Admin cannot create Root Admin account, Campus Admin cannot create Campus Admin/Staff/User account from another campus

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost/api/user/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/create"
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
 **`api/user/create`**



## Delete a User

⚠️ Admin Level 1, 2 required (1 - Root Admin | 2 - Campus Admin), 
also Campus Admin cannot delete Root Admin account, Campus Admin cannot delete Campus Admin/Staff/User account from another campus




> Example request:

```bash
curl -X POST \
    "http://localhost/api/user/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/delete"
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
 **`api/user/delete`**




