export const CONVERSATION_TYPE = Object.freeze({
    private: {name: 'Private', value: 'private'},
    group  : {name: 'Group', value: 'group'}
});

export const MESSAGE_TYPE = Object.freeze({
    text    : {name: 'Text', value: 'text'},
    image   : {name: 'Image', value: 'image'},
    video   : {name: 'Video', value: 'video'},
    audio   : {name: 'Audio', value: 'audio'},
    document: {name: 'Document', value: 'document'},
    location: {name: 'Location', value: 'location'},
    contact : {name: 'Contact', value: 'contact'}
});
