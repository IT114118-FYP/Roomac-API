# Resource Booking


## Retrieve all resource&#039;s bookings

Retrieve all resource&#039;s bookings - Display in Timetable




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings"
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
    "interval": 30,
    "timezone": "Asia\/Hong_Kong",
    "opening_time": "08:00:00",
    "closing_time": "21:00:00",
    "bookings": {
        "allow_times": [
            {
                "id": 1,
                "resource_id": 1,
                "start_time": "2020-12-14T04:00:00.000000Z",
                "end_time": "2020-12-14T21:00:00.000000Z",
                "day_of_week": 1,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:00.000000Z",
                "updated_at": "2020-12-14T22:25:00.000000Z"
            },
            {
                "id": 2,
                "resource_id": 1,
                "start_time": "2020-12-14T00:30:00.000000Z",
                "end_time": "2020-12-14T22:00:00.000000Z",
                "day_of_week": 2,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:00.000000Z",
                "updated_at": "2020-12-14T22:25:00.000000Z"
            },
            {
                "id": 3,
                "resource_id": 1,
                "start_time": "2020-12-14T00:30:00.000000Z",
                "end_time": "2020-12-14T22:00:00.000000Z",
                "day_of_week": 3,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:01.000000Z",
                "updated_at": "2020-12-14T22:25:01.000000Z"
            },
            {
                "id": 4,
                "resource_id": 1,
                "start_time": "2020-12-14T00:30:00.000000Z",
                "end_time": "2020-12-14T22:00:00.000000Z",
                "day_of_week": 4,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:01.000000Z",
                "updated_at": "2020-12-14T22:25:01.000000Z"
            },
            {
                "id": 5,
                "resource_id": 1,
                "start_time": "2020-12-14T00:30:00.000000Z",
                "end_time": "2020-12-14T22:00:00.000000Z",
                "day_of_week": 5,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:02.000000Z",
                "updated_at": "2020-12-14T22:25:02.000000Z"
            }
        ],
        "unavailable": {
            "booked": [
                {
                    "id": 1,
                    "user_id": 2,
                    "resource_id": 1,
                    "branch_setting_version_id": null,
                    "start_time": "2020-12-14T01:30:00.000000Z",
                    "end_time": "2020-12-14T02:30:00.000000Z",
                    "created_at": "2020-12-14T22:25:02.000000Z",
                    "updated_at": "2020-12-14T22:25:02.000000Z"
                },
                {
                    "id": 2,
                    "user_id": 2,
                    "resource_id": 1,
                    "branch_setting_version_id": null,
                    "start_time": "2020-12-14T02:30:00.000000Z",
                    "end_time": "2020-12-14T03:30:00.000000Z",
                    "created_at": "2020-12-14T22:25:03.000000Z",
                    "updated_at": "2020-12-14T22:25:03.000000Z"
                },
                {
                    "id": 3,
                    "user_id": 2,
                    "resource_id": 1,
                    "branch_setting_version_id": null,
                    "start_time": "2020-12-14T04:30:00.000000Z",
                    "end_time": "2020-12-14T05:30:00.000000Z",
                    "created_at": "2020-12-14T22:25:04.000000Z",
                    "updated_at": "2020-12-14T22:25:04.000000Z"
                }
            ],
            "reserved": []
        }
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/resources/{resource}/bookings`**



## Add a new booking record

Add a new booking record.




> Example request:

```bash
curl -X POST \
    "https://it114118-fyp.herokuapp.com/api/resources/{resource}/bookings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"start_time":"id","end_time":"ipsam"}'

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
    "start_time": "id",
    "end_time": "ipsam"
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
<code><b>start_time</b></code>&nbsp; <small>string</small>     <br>
    Start time of the booking in UTC datetime format (Y-m-dTH:i:sZ)

<code><b>end_time</b></code>&nbsp; <small>string</small>     <br>
    End time of the booking in UTC datetime format (Y-m-dTH:i:sZ)




