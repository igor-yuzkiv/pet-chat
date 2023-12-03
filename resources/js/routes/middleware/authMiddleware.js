import {ROUTES} from "@/routes/navigation.js";
import {useUserStore} from "@/store/useUserStore.js";
import {fetchCurrentUser} from "@/api/userApi.js";

export default async function (to, from, next) {
    const currentUser = await fetchCurrentUser()
        .then(({data}) => data)
        .catch(() => null);

    if (!currentUser?.id) {
        next({name: ROUTES.login.name});
        return;
    }

    const userStore = useUserStore();
    userStore.setCurrentUser(currentUser);

    next();
}
