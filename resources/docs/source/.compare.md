---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://sportrex.dev/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_4b90f657df4927ac7a249b99226ea7e1 -->
## Get the index of a given version.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/docs/search-index/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/docs/search-index/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET docs/search-index/{version}`


<!-- END_4b90f657df4927ac7a249b99226ea7e1 -->

<!-- START_568f07577ee68f8b1116e97fd4a5d842 -->
## docs/styles/{style}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/docs/styles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/docs/styles/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET docs/styles/{style}`


<!-- END_568f07577ee68f8b1116e97fd4a5d842 -->

<!-- START_7cdb95077f4d2842f8268003be0400e6 -->
## docs/scripts/{script}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/docs/scripts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/docs/scripts/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET docs/scripts/{script}`


<!-- END_7cdb95077f4d2842f8268003be0400e6 -->

<!-- START_b49197dda1e390d1c17aa2d177702247 -->
## Redirect the index page of docs to the default version.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/docs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/docs"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET docs`


<!-- END_b49197dda1e390d1c17aa2d177702247 -->

<!-- START_9befedf0e2960c8902af7f03e63fbcb2 -->
## Show a documentation page.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/docs/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/docs/1/"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET docs/{version}/{page?}`


<!-- END_9befedf0e2960c8902af7f03e63fbcb2 -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## /
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_3445d48e6af87da50887f69c2d645847 -->
## cart/{order}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/cart/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/cart/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET cart/{order}`


<!-- END_3445d48e6af87da50887f69c2d645847 -->

<!-- START_a5f278430614ace249d56e65550dd8d9 -->
## cart/{order}
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/cart/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/cart/1"
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



### HTTP Request
`POST cart/{order}`


<!-- END_a5f278430614ace249d56e65550dd8d9 -->

<!-- START_47c3ba5c8b65718350fcccee2736bfbe -->
## delivery/{order}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/delivery/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/delivery/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET delivery/{order}`


<!-- END_47c3ba5c8b65718350fcccee2736bfbe -->

<!-- START_5a98d0b18843d2351fe2732a2ea8ae08 -->
## deliveryKurier/{order}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/deliveryKurier/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/deliveryKurier/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET deliveryKurier/{order}`


<!-- END_5a98d0b18843d2351fe2732a2ea8ae08 -->

<!-- START_4f2fcd252ba0d63eb0090a5b54bdcd5c -->
## deliveryPoczta/{order}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/deliveryPoczta/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/deliveryPoczta/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET deliveryPoczta/{order}`


<!-- END_4f2fcd252ba0d63eb0090a5b54bdcd5c -->

<!-- START_00ae0d62f76864faeb843461bbba1392 -->
## deliveryPaczkomat/{order}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/deliveryPaczkomat/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/deliveryPaczkomat/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET deliveryPaczkomat/{order}`


<!-- END_00ae0d62f76864faeb843461bbba1392 -->

<!-- START_9387691312a1822b5b47e771fa34b79c -->
## deliveryKurier/{order}
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/deliveryKurier/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/deliveryKurier/1"
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



### HTTP Request
`POST deliveryKurier/{order}`


<!-- END_9387691312a1822b5b47e771fa34b79c -->

<!-- START_3a6ee8ea724032b94a06b9fff7768832 -->
## deliveryPoczta/{order}
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/deliveryPoczta/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/deliveryPoczta/1"
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



### HTTP Request
`POST deliveryPoczta/{order}`


<!-- END_3a6ee8ea724032b94a06b9fff7768832 -->

<!-- START_fa11a17065d5a2e72dad467808d1cb9d -->
## deliveryPaczkomat/{order}
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/deliveryPaczkomat/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/deliveryPaczkomat/1"
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



### HTTP Request
`POST deliveryPaczkomat/{order}`


<!-- END_fa11a17065d5a2e72dad467808d1cb9d -->

<!-- START_eba12e80d058411f7aa1998bd9b7e3ce -->
## paymentCard/{order}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/paymentCard/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/paymentCard/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET paymentCard/{order}`


<!-- END_eba12e80d058411f7aa1998bd9b7e3ce -->

<!-- START_0702543a00f3a211aa929cbc300d1f32 -->
## paymentCard/{order}
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/paymentCard/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/paymentCard/1"
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



### HTTP Request
`POST paymentCard/{order}`


<!-- END_0702543a00f3a211aa929cbc300d1f32 -->

<!-- START_c127f7d08f81127b66737f78b36f89f7 -->
## paymentTransfer/{order}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/paymentTransfer/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/paymentTransfer/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET paymentTransfer/{order}`


<!-- END_c127f7d08f81127b66737f78b36f89f7 -->

<!-- START_770c4d2224033a756237cdea2ab7b2c0 -->
## paymentTransfer/{order}
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/paymentTransfer/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/paymentTransfer/1"
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



### HTTP Request
`POST paymentTransfer/{order}`


<!-- END_770c4d2224033a756237cdea2ab7b2c0 -->

<!-- START_8a164e474eca58a75cc5e9ddf2f99922 -->
## order/{order}/complaint
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/order/1/complaint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/order/1/complaint"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET order/{order}/complaint`


<!-- END_8a164e474eca58a75cc5e9ddf2f99922 -->

<!-- START_964bca1450da3082bc030451516ae1ef -->
## complaint/create
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/complaint/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/complaint/create"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET complaint/create`


<!-- END_964bca1450da3082bc030451516ae1ef -->

<!-- START_5f76aef8fe5a0858ace70eebd8ee87b2 -->
## complaint
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/complaint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/complaint"
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



### HTTP Request
`POST complaint`


<!-- END_5f76aef8fe5a0858ace70eebd8ee87b2 -->

<!-- START_c12fde94f26a2259a04ba7d3755a8377 -->
## complaint/orders
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/complaint/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/complaint/orders"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET complaint/orders`


<!-- END_c12fde94f26a2259a04ba7d3755a8377 -->

<!-- START_45ce2f220b87ff18f8235661a1be70cc -->
## product/{product}/addToCart
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/product/1/addToCart" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/product/1/addToCart"
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



### HTTP Request
`POST product/{product}/addToCart`


<!-- END_45ce2f220b87ff18f8235661a1be70cc -->

<!-- START_11d6afb3ece91a13a1d8d6b386545b1b -->
## orderDetails/{order}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/orderDetails/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/orderDetails/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET orderDetails/{order}`


<!-- END_11d6afb3ece91a13a1d8d6b386545b1b -->

<!-- START_1c304c7b939d008121ebd4e9502a805d -->
## myOrders/{user}
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/myOrders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/myOrders/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET myOrders/{user}`


<!-- END_1c304c7b939d008121ebd4e9502a805d -->

<!-- START_abfa07e97111c9c51998fb116cd4c68a -->
## checkOrder
> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/checkOrder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/checkOrder"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET checkOrder`


<!-- END_abfa07e97111c9c51998fb116cd4c68a -->

<!-- START_acced7685f2898c9e191430ec81f41d5 -->
## checkOrder
> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/checkOrder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/checkOrder"
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



### HTTP Request
`POST checkOrder`


<!-- END_acced7685f2898c9e191430ec81f41d5 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/login"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/login"
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



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/logout"
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



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/register"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/register"
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



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/password/reset"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/password/email"
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



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/password/reset/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/password/reset"
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



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/password/confirm"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://sportrex.dev/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/password/confirm"
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



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://sportrex.dev/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://sportrex.dev/home"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->


