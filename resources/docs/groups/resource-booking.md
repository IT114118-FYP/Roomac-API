# Resource Booking


## Retrieve all resource&#039;s bookings

Retrieve all resource&#039;s bookings - Display in Timetable




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings?start=illum&end=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings"
);

let params = {
    "start": "illum",
    "end": "qui",
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
    -d '{"date":"libero","start":"molestias","end":"et"}'

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
    "date": "libero",
    "start": "molestias",
    "end": "et"
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




