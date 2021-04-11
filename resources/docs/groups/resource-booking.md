# Resource Booking


## Retrieve all resource&#039;s bookings

Retrieve all resource&#039;s bookings. Example: /api/resources/1/bookings?start=2021-01-24&amp;end=2021-01-30




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings?start=ut&end=non" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings"
);

let params = {
    "start": "ut",
    "end": "non",
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
 **`api/resources/{resource}/bookings`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>start</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    query start time in Y-m-d format. Defaults to 2021-01-13.

<code><b>end</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    query end time in Y-m-d format. Defaults to 2021-01-15.



## Add a new booking record

Add a new booking record.




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"date":"incidunt","start":"et","end":"praesentium"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "date": "incidunt",
    "start": "et",
    "end": "praesentium"
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
 **`api/resources/{resource}/bookings`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>date</b></code>&nbsp; <small>string</small>     <br>
    Date of the booking (Y-m-d).

<code><b>start</b></code>&nbsp; <small>string</small>     <br>
    Start time of the booking (H:i:s).

<code><b>end</b></code>&nbsp; <small>string</small>     <br>
    End time of the booking (H:i:s).



## Update a booking record

Update a booking record.




> Example request:

```bash
curl -X PUT \
    "https://it114118-fyp.herokuapp.com/api/resourcebookings/{resourceBooking}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"date":"magnam","start":"debitis","end":"velit"}'

```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resourcebookings/{resourceBooking}"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "date": "magnam",
    "start": "debitis",
    "end": "velit"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/resourcebookings/{resourceBooking}`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>date</b></code>&nbsp; <small>string</small>     <br>
    Date of the booking (Y-m-d).

<code><b>start</b></code>&nbsp; <small>string</small>     <br>
    Start time of the booking (H:i:s).

<code><b>end</b></code>&nbsp; <small>string</small>     <br>
    End time of the booking (H:i:s).



## Remove a booking record

Remove a booking record.




> Example request:

```bash
curl -X DELETE \
    "https://it114118-fyp.herokuapp.com/api/resourcebookings/{resourceBooking}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resourcebookings/{resourceBooking}"
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
 **`api/resourcebookings/{resourceBooking}`**



## Get a check-in code

Get a check-in code (Convert to QR code in front-end).




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resourcebookings/{resourceBooking}/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resourcebookings/{resourceBooking}/code"
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
 **`api/resourcebookings/{resourceBooking}/code`**



## Check-in

Check-in.




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/checkin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/checkin"
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
 **`api/resources/{resource}/checkin`**



## Check-in (admin)

Check-in (admin).




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/resourcebookings/{resourceBooking}/checkin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resourcebookings/{resourceBooking}/checkin"
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
 **`api/resourcebookings/{resourceBooking}/checkin`**




