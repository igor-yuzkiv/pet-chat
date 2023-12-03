import {ApiResource} from "@/api/index.js";

const conversationsApi = new ApiResource('/conversations');
conversationsApi.availableIncludes = {
    messages: 'messages',
    members : 'members',
}

export {conversationsApi}
