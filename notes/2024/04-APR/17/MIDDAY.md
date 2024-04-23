# Basic React : 17th April 2024 #171
## 1. How the state is managed between the child and parent component? How can trigger the re-render of the parent component from the child component?
1. State can be managed between child and parent components by lifting the state up. This means that the state is managed by a common ancestor component, and then passed down to the child components as props.
2. When a child component needs to update the state, it calls a function passed down from the parent component as a prop. This triggers a state change in the parent component, which then re-renders and passes the updated state back down to the child component.

### Example
`ParentComponent.js`
```jsx
import React, { useState } from 'react';
import ChildComponent from './ChildComponent';

function ParentComponent() {
  const [count, setCount] = useState(0);

  const incrementCount = () => {
    setCount(prevCount => prevCount + 1);
  };

  return (
    <div>
      <h2>Parent Component</h2>
      <p>Count: {count}</p>
      <ChildComponent increment={incrementCount} />
    </div>
  );
}

export default ParentComponent;
```

`ChildComponent.js`
```jsx
import React from 'react';

function ChildComponent({ increment }) {
  return (
    <div>
      <h2>Child Component</h2>
      <button onClick={increment}>Increment Count</button>
    </div>
  );
}

export default ChildComponent;
```

## 2. Difference between controlled and uncontrolled components.
### Controlled Components
In controlled components, form data is handled by React state. The value of the form elements (like input, textarea, select) is controlled by the state of the component.
### Uncontrolled Components
In uncontrolled components, form data is handled by the DOM itself.

## 3. Explain hooks which help in optimizing a React application
React provides several hooks that help in optimizing performance:
1. `useMemo`: Memoizes the result of a function component to prevent unnecessary re-renders.
2. `useCallback`: Returns a memoized callback function that only changes if one of the dependencies has changed.
3. `useEffect`: Allows performing side effects in function components, such as data fetching, subscriptions, or manually changing the DOM.
4. `useReducer`: Alternative to `useState` for managing more complex state logic.
5. `useRef`: Returns a mutable ref object whose `.current` property is initialized to the passed argument.

## 4. On re-render of a component, does the component re-render completely or just modified part of the component re-render?
1. When a component re-renders, React re-renders the entire component. 
2. However, React uses a *virtual DOM* to efficiently update the actual DOM, so **not all DOM elements are necessarily re-rendered**. 
3. React compares the virtual DOM representation before and after the **re-render and only updates the parts of the DOM that have changed.**

## 5. Refer to the code snippet shared below and answer the questions:  
```jsx
const CustomComponent = () => {
	let ctr = 0;

	// Function to handle increment.
	const handleIncrement = () => {
		ctr += 1;
		console.log( ctr );
	}

	return (
		<>
		{ /* This is where 'ctr' is displayed */ }
		<h1>ctr</h1>
		{ /* This is where the user can increment 'ctr'*/ }
		<button onClick={handleIncrement}>Increment</button>
		</>
	);
}
```
### 5.1 What would be logged to the console when the "Increment" button is clicked once (assume ctr = 0 initially)?  
When **Increment** button is clicked, the value logged will be **`'1'`**.

### 5.2 What value is displayed(inside h1) when the "increment" button is clicked once (assume ctr= 0 initially)?
The value displayed inside the `<h1>` tag will be `ctr`. This is because `ctr` is treated as a string literal inside the JSX code.

## 6. What is "StrictMode" in React? Is it possible to use it in production?
1. `StrictMode` is a tool for highlighting potential problems in a React application. 
2. It activates additional checks and warnings for potential issues in the code. 
3. It helps in identifying unsafe lifecycles, legacy string ref usage, and more. 
4. `StrictMode` is **not intended for use in production** but rather for development and testing purposes. It may cause some side effects like double-invoking component lifecycle methods and should be disabled in production builds.

```jsx
function App() { 
	return ( 
		<StrictMode> 
			<ParentComponent /> 
		</StrictMode> 
	); 
}
```