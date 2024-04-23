# Basic React : 18th April 2024 #175

## 1. What's a Fragment in React? When should we use a Fragment?
1. `<Fragment>`, often used via `<>...</>` syntax, lets you group elements without a wrapper node.
2. A Fragment is a built-in component in React that allows you to group multiple children elements without adding extra nodes to the DOM.
3. Fragments are particularly useful when you need to return multiple elements from a component's render method, but you don't want to create an additional wrapping element.

```jsx
return (
	<>
		<OneChild />  
		<AnotherChild />  
	</>
);
```

## 2. What would be the value of count initially?

```jsx
const CustomComponent = () => {
	const [count, ] = useState(() => {return 1});

	return null;
}
```

The value of `count` initially would be `1`. This is because the `useState` hook is initialised with a function as its argument, which returns the initial state value.

## 3. What would be the value that is logged to the console after the button Increment is pressed once?

```jsx
const CustomComponent = () => {
	const [count, setCount] = useState( 0 );

	return (
		<button onClikc={
			setCount( count + 1 );
			console.log( count );
		}>
			Increment
		</button>
	)
}
```

1. In the provided code snippet, the value logged to the console after the button "Increment" is pressed once would still be `0`. 
2. This is because `console.log(count)` is executed **synchronously** after `setCount(count + 1)`, but the state update triggered by `setCount` is asynchronous. So, the value of `count` logged to the console will not reflect the updated state immediately.

## 4. In the following snippet, would the value displayed in `<h1>` change when the Change button is clicked? If not, how can I make it work?

```jsx
const CustomComponent = () => {
	const [ person, setPerson ] = useState(
		{
			name: "Bareen",
			role: "Making sure you guys are ready for the delivery team",
			best_friends: "Nikita"
		}
	);

	const handleChange = () => {
		person.best_friends = "Nikita & Archana";
		setPerson( person );
	};

	return (
		<>
			<h1> (person.best_friends)</h1>
			< button onClick={handleChange)>Change</button>
		</>
	)
}
```

1. **No**, the value displayed in `<h1>` will not change when the "Change" button is clicked.
2. This is because React's state updates are shallow merges, and mutating the state object directly won't trigger a re-render.

**Updated Code**: Update the `handleChange` function.

```jsx
const handleChange = () => { 
	// Create a new object with the updated value 
	const updatedPerson = { ...person, best_friends: "Nikita & Archana" }; 
	setPerson(updatedPerson);
};
```


cc @abhishekfdd