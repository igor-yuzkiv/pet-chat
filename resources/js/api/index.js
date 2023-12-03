import httpClient from "@/services/httpClient.js";

/**
 *
 * @param {string[]} includes
 * @param query
 */
export function getIncludesQuery(includes, query = {}) {
    if (typeof query !== 'object') {
        query = {};
    }

    if (Array.isArray(includes) && includes.length) {
        query['includes'] = includes.join(',');
    }

    return query;
}

export function getFiltersQuery(filters, query = {}) {
    if (typeof query !== 'object') {
        query = {};
    }

    if (Array.isArray(filters) && filters.length) {
        for (let index = 0; index < filters.length; index++) {
            query[`filters[${index}]`] = filters[index];
        }
    }

    return query;
}


export function getQueryStrings(query = {}) {
    return new URLSearchParams(query).toString();
}

export function ApiResource(uri) {
    this.uri = uri;

    return {
        uri: this.uri,

        getList: (options = {query: {}, includes: [], filters: []}) => {
            const query = options?.query || {};

            const queryString = getQueryStrings({
                ...getIncludesQuery(options?.includes || []),
                ...getFiltersQuery(options?.filters || []),
                ...query,
            })

            return httpClient.get(this.uri + '?' + queryString);
        },

        getById: (id, includes = []) => {
            const query = getQueryStrings(getIncludesQuery(includes));
            return httpClient.get(`${this.uri}/${id}?${query}`);
        },

        create : (data) => {
            return httpClient.post(this.uri, data);
        },

        update : (id, data) => {
            return httpClient.put(`${this.uri}/${id}`, data);
        },

        delete : (id) => {
            return httpClient.delete(`${this.uri}/${id}`);
        },

        bulkDelete: (ids) => {
            return httpClient.post(`${this.uri}/bulk/delete`, {ids});
        }
    }
}
