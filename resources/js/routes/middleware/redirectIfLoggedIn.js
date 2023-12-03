import {fetchCurrentUser} from "@/api/userApi.js";
import {ROUTES} from "@/routes/navigation.js";

export default async function (to, from, next) {
    const currentUser = await fetchCurrentUser()
        .then(({data}) => data)
        .catch(() => null);

    if (currentUser?.id) {
        next({name: ROUTES.home.name});
        return;
    }

    next();
}
