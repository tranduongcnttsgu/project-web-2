import { createStore } from '../redux/core.js';
import withLogger from '../redux/DevLogger.js';
import reducer from './userSlice.js';
const { attach, connect, dispatch } = await createStore(withLogger(reducer));
window.dispatch = dispatch;
const render = (elementRoot, component) => {
    if (elementRoot) {
        attach(component, elementRoot);
    }
};
const renderOnlyOne = async (elementRoot, component) => {
    if (elementRoot) {
        elementRoot.innerHTML = await component();
    }
};
export { render, connect, renderOnlyOne };
