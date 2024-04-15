export default function html([frist, ...strings], ...values) {
    return values
        .reduce((acc, cur) => acc.concat(cur, strings.shift()), [frist])
        .filter((x) => (x && x !== true) || x === 0)
        .join('');
}
export async function createStore(reducer) {
    let state = await reducer();
    const roots = new Map();
    async function render() {
        for (const [root, component] of roots) {
            const output = await component();
            root.innerHTML = output;
        }
    }

    return {
        async attach(component, root) {
            roots.set(root, component);
            await render();
        },
        connect(selector = (state) => state) {
            return (component) =>
                (prop, ...args) =>
                    component(
                        Object.assign({}, prop, selector(state), ...args)
                    );
        },
        async dispatch(action, ...args) {
            state = await reducer(state, action, args);
            await render();
        },
    };
}
