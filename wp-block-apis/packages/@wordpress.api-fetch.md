# Usage

## GET with Query Args

```js
import apiFetch from '@wordpress/api-fetch';
import { addQueryArgs } from '@wordpress/url';

const queryParams = { include: [1,2,3] }; // Return posts with ID = 1,2,3.

apiFetch( { path: addQueryArgs( '/wp/v2/posts', queryParams ) } ).then( ( posts ) => {
    console.log( posts );
} );
```

## POST

```js
apiFetch( {
    path: '/wp/v2/posts/1',
    method: 'POST',
    data: { title: 'New Post Title' },
} ).then( ( res ) => {
    console.log( res );
} );
```

## Options

`apiFetch` supports and passes through all [options of the `fetch` global](https://developer.mozilla.org/en-US/docs/Web/API/WindowOrWorkerGlobalScope/fetch).

Additionally, the following options are available:

#### `path` (`string`)

Shorthand to be used in place of `url`, appended to the REST API root URL for the current site.

#### `url` (`string`)

Absolute URL to the endpoint from which to fetch.

#### `parse` (`boolean`, default `true`)

Unlike `fetch`, the `Promise` return value of `apiFetch` will resolve to the parsed JSON result. Disable this behavior by passing `parse` as `false`.

#### `data` (`object`)

Sent on `POST` or `PUT` requests only. Shorthand to be used in place of `body`, accepts an object value to be stringified to JSON.

# How can we abort a request ?
### Aborting a request

Aborting a request can be achieved through the use of [`AbortController`](https://developer.mozilla.org/en-US/docs/Web/API/AbortController) in the same way as you would when using the native `fetch` API.

For legacy browsers that don’t support `AbortController`, you can either:

- Provide your own polyfill of `AbortController` if you still want it to be abortable.
- Ignore it as shown in the example below.

**Example**

```js
const controller =
    typeof AbortController === 'undefined' ? undefined : new AbortController();

apiFetch( { path: '/wp/v2/posts', signal: controller?.signal } ).catch(
    ( error ) => {
        // If the browser doesn't support AbortController then the code below will never log.
        // However, in most cases this should be fine as it can be considered to be a progressive enhancement.
        if ( error.name === 'AbortError' ) {
            console.log( 'Request has been aborted' );
        }
    }
);

controller?.abort();
```


# Middleware
The `api-fetch` package supports middlewares. Middlewares are functions you can use to wrap the `apiFetch` calls to perform any pre/post process to the API requests.


```js
import apiFetch from '@wordpress/api-fetch';

apiFetch.use( ( options, next ) => {
    const start = Date.now();
    const result = next( options );
    result.then( () => {
        console.log( 'The request took ' + ( Date.now() - start ) + 'ms' );
    } );
    return result;
} );
```

## Built-in middleware
### Nonce Middleware
```js
import apiFetch from '@wordpress/api-fetch';

const nonce = 'nonce value';
apiFetch.use( apiFetch.createNonceMiddleware( nonce ) );
```

The function returned by `createNonceMiddleware` includes a `nonce` property corresponding to the actively used nonce. You may also assign to this property if you have a fresh nonce value to use.
### Root URL Middleware



