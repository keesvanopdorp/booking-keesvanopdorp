import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import List from '@editorjs/list';
new EditorJS({
    /**
     * Id of Element that should contain the Editor
     */
    placeholder: 'Let`s write an awesome story!',
    readOnly: true,


    /**
     * Available Tools list.
     * Pass Tool's class or Settings object for each Tool you want to use
     */
    tools: {
        header: {
            class: Header,
            inlineToolbar: ['link']
        },
        list: {
            class: List,
            inlineToolbar: true
        }
    },
});
