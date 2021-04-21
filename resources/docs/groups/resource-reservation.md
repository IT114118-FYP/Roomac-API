# Resource Reservation


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


> Example response (200):

```json
[
    {
        "id": 1,
        "user_id": 2,
        "resource_id": 1,
        "start_time": "2021-04-24T01:30:00",
        "end_time": "2021-04-24T02:00:00",
        "start": "01:30:00",
        "end": "02:00:00",
        "day_of_week": 0,
        "repeat": 1,
        "created_at": null,
        "updated_at": null
    }
]
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
    -d '{"date":"quibusdam","start":"et","end":"fuga","repeat":true}'

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
    "date": "quibusdam",
    "start": "et",
    "end": "fuga",
    "repeat": true
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


> Example response (200):

```json

[]
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




