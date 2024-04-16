# Basic React : 16th April 2024 #166
## 1. Can we write functional components without using JSX? If yes, then how?
1. **Yes**, we can write functions without using JSX.
2. For this we can use `React.createComponent` function, here's an example,

```js
import React from 'react';

function MyComponent( props ) {
	return React.createComponent(
		'h1',
		{
			'className' : 'greeting'
		},
		'Hello World!'
	)
}
```

The above code is equivalent to writing the below code in `JSX`.

```jsx
const element = (
	<h1 className="greeting">
		Hello World!
	</h1>
);
```

## 2. Is there any feature-set available only to class-based components and not to function components?
1. Prior to React 16.8, class components had features like lifecycle methods and local state management that were not available in function components.
2. However, with the introduction of React Hooks in React 16.8, function components can now also use features like state and lifecycle methods, making them almost equivalent to class components in terms of functionality.
## 3. Is React client-side or server-side by nature? Can React be used server-side?
1. React is **primarily a client-side library** for building user interfaces. 
2. However, it can also be used server-side with tools like *Next.js* or *Gatsby.js*, where React components are rendered on the server and sent as HTML to the client.

## 4. What is VDOM and where is it stored?
1. VDOM stands for **Virtual DOM**. 
2. It is an **in-memory** representation of the actual DOM elements. 
3. React uses the VDOM to perform efficient updates to the actual DOM. 
4. The VDOM is stored in memory and is managed by React internally.

## 5. How do we create a functional component? How can we use it as another file?

### Creating a functional components

`greeting.js`

```jsx
import React from 'react';

function Greeting( props ) {
	return (
		<h1 class="greeting">
			Hello, {props.name}
		</h1>
	);
}

export deafult Greeting
```

### Using it in another file

```jsx
import React from 'react';
import Greeting from './greeting';

function App() {
	return (
		<div>
			<Greeting name="Abhinav" />
			<Greeting name="Shardul" />
		</div>
	)
}

export default App;
```
## 6. Can a component modify props?
1. **No**, a component cannot directly modify its props.
2. Props are immutable in React, meaning that they cannot be changed by the component itself.
3. Props are passed from parent components and are intended to be read-only within the component. 
4. If a component needs to update its data, it should manage it through state or callback functions passed as props.

cc @abhishekfdd