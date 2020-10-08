# Login


## Authenticate a User




> Example request:

```bash
curl -X POST \
    "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/login"
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


> Example response (200, success):

```json

1|sNt8wF0Zh4oGJ20O22gns0K4bI2HJfkqNZWiKoEX
```

### Request
<small class="badge badge-black">POST</small>
 **`api/login`**



## Logout a User

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/logout"
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
 **`api/logout`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>global</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    When this value is set to true all of the tokens issued to the user will be revoked. Defaults to false.



## Fetch current user information

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/me"
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
    "updated_at": "2020-10-07T17:44:37.000000Z",
    "deleted_at": null
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/user/me`**




