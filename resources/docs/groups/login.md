# Login


## Authenticate a user




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/login"
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



## Logout a user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/logout"
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




