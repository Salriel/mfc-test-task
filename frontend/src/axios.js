import axios from "axios";
import config from "./config";

const axiosClient = axios.create({
   baseURL: 'http://' + config.backend_domain + '/api'
});

axiosClient.interceptors.request.use(config => {
    return config;
});

export default axiosClient;
