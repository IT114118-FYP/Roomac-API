# Venue Booking


## Retrieve all venue&#039;s bookings timetable




> Example request:

```bash
curl -X GET \
    -G "https://it114118-fyp.herokuapp.com/api/venues/{venue}/bookings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://it114118-fyp.herokuapp.com/api/venues/{venue}/bookings"
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
                "venue_id": 1,
                "start_time": "2020-12-14T04:00:00.000000Z",
                "end_time": "2020-12-14T21:00:00.000000Z",
                "day_of_week": 1,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:00.000000Z",
                "updated_at": "2020-12-14T22:25:00.000000Z"
            },
            {
                "id": 2,
                "venue_id": 1,
                "start_time": "2020-12-14T00:30:00.000000Z",
                "end_time": "2020-12-14T22:00:00.000000Z",
                "day_of_week": 2,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:00.000000Z",
                "updated_at": "2020-12-14T22:25:00.000000Z"
            },
            {
                "id": 3,
                "venue_id": 1,
                "start_time": "2020-12-14T00:30:00.000000Z",
                "end_time": "2020-12-14T22:00:00.000000Z",
                "day_of_week": 3,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:01.000000Z",
                "updated_at": "2020-12-14T22:25:01.000000Z"
            },
            {
                "id": 4,
                "venue_id": 1,
                "start_time": "2020-12-14T00:30:00.000000Z",
                "end_time": "2020-12-14T22:00:00.000000Z",
                "day_of_week": 4,
                "repeat": 1,
                "created_at": "2020-12-14T22:25:01.000000Z",
                "updated_at": "2020-12-14T22:25:01.000000Z"
            },
            {
                "id": 5,
                "venue_id": 1,
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
                    "venue_id": 1,
                    "branch_setting_version_id": null,
                    "start_time": "2020-12-14T01:30:00.000000Z",
                    "end_time": "2020-12-14T02:30:00.000000Z",
                    "created_at": "2020-12-14T22:25:02.000000Z",
                    "updated_at": "2020-12-14T22:25:02.000000Z"
                },
                {
                    "id": 2,
                    "user_id": 2,
                    "venue_id": 1,
                    "branch_setting_version_id": null,
                    "start_time": "2020-12-14T02:30:00.000000Z",
                    "end_time": "2020-12-14T03:30:00.000000Z",
                    "created_at": "2020-12-14T22:25:03.000000Z",
                    "updated_at": "2020-12-14T22:25:03.000000Z"
                },
                {
                    "id": 3,
                    "user_id": 2,
                    "venue_id": 1,
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
 **`api/venues/{venue}/bookings`**




