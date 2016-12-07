/**
 * Created by Chen on 2016-12-02.
 */
const API_BASE_URL = 'http://localhost:888/api/v1';
const API_SCHOOLS = '/schools';
const API_USERS = '/users';
const API_ME = '/me';
const API_HISTORY = '/history';
const API_DRIVE_HISTORY = '/drive_history';

const API_RANKING_HIGHEST_RATED_DRIVERS = '/rankings/highest_rated_drivers';
const API_RANKING_MOST_ATTRACTIVE_DRIVERS= '/rankings/most_attractive_drivers';
const API_RANKING_HIGHEST_RATED_PASSENGERS='/rankings/highest_rated_passengers';

const API_FREQUENT_USED_LOCATIONS = '/frequent_used_locations';

function constructPaginationUrl(path, page = 1, per_page = 5){
    return `${path}?page=${page}&per_page=${per_page}`;
}