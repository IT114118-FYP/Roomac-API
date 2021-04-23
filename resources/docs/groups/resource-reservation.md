# Resource Reservation


## Retrieve all resource&#039;s reservations (admin)

Retrieve all resource&#039;s reservations. Example: /api/resources/1/reservations?start=2021-01-24&amp;end=2021-01-30




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources/{resource}/reservations?start=consequatur&end=illum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/reservations"
);

let params = {
    "start": "consequatur",
    "end": "illum",
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
 **`api/resources/{resource}/reservations`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>start</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    query start time in Y-m-d format. Defaults to 2021-01-13.

<code><b>end</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    query end time in Y-m-d format. Defaults to 2021-01-15.



## Retrieve all resource&#039;s reservations

Retrieve all resource&#039;s reservations.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/reservations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/reservations"
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
 **`api/reservations`**



## Add a new resource reservation record

Add a new resource reservation record.




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/reservations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"resource_id":6,"date":"quaerat","start":"ex","end":"rerum","repeat":false}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/reservations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "resource_id": 6,
    "date": "quaerat",
    "start": "ex",
    "end": "rerum",
    "repeat": false
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
 **`api/reservations`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>resource_id</b></code>&nbsp; <small>integer</small>     <br>
    Resource Id.

<code><b>date</b></code>&nbsp; <small>string</small>     <br>
    Date of the booking (Y-m-d).

<code><b>start</b></code>&nbsp; <small>string</small>     <br>
    Start time of the booking (H:i:s).

<code><b>end</b></code>&nbsp; <small>string</small>     <br>
    End time of the booking (H:i:s).

<code><b>repeat</b></code>&nbsp; <small>boolean</small>     <br>
    Is repeat? true or false.



## Retrieve a resource&#039;s reservation record

Retrieve a resource&#039;s reservation record.




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/reservations/{reservation}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/reservations/{reservation}"
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
 **`api/reservations/{reservation}`**



## Remove a resource&#039;s reservation record

Remove a resource&#039;s reservation record.




> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/reservations/{reservation}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/reservations/{reservation}"
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
 **`api/reservations/{reservation}`**




