# React: Fundamentals Of Data Management By *Divyaraj Masani* 

## Components
1. In react website everything is a **component**, these different components come together and build the UI. They use #JSX [[2.3-react-and-next#Introduction To JSX JSX]]
2. We can pretty much skip JSX, using the `React.createElement` function.

## Props
1. We can't update the **props** they are just read only. BTW, they can't be updated from child, so basically if the parent updated and passes it to the child then it's updated.

## Data Management
1. So **state** is specific to the component. So state is immutable ? **No**, we can change.
2. Ways to store the data
	1. As a variable (`const`, `let`) - Do not persist (Mutable)
	2. Props - persist (Advantage immutable)
	3. As state in component
### `useState`

```jsx
const [ title, setTitle ] = useState( "Hello, World!" );
```

So we basically pass the default value to the function, and we get two things, the value and a update function.

**Note**: In development mode, react renders everything two times (Read More)
**Note**: React does a *shallow copy*, so you basically might reference to the original object. Since JS has [*garbage collectors*](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Memory_management) so it's not an issue as such of creating multiple copies.

1. State updates are not *synchronous* in **react**.
2. 


**See**
[[1.2-asset-building-using-webpack-and-babel]]

#react