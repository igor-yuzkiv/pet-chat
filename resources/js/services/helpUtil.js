export function prepareConversationName(conversation, members = [], defaultName = "Untitled") {
    if (conversation?.name) {
        return conversation.name;
    }

    let name = defaultName;

    if (members.length) {
        name = `${members[0].name}`;
        if (members.length > 1) {
            name += ` and ${members.length - 1} other`;
        }
    }

    return name;
}
