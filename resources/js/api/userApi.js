import httpClient from "@/services/httpClient.js";

export async function fetchCurrentUser() {
    return await httpClient.get("auth/user")
}
