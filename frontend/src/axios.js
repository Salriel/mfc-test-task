import axios from "axios";

const axiosClient = axios.create({
   baseURL: 'http://localhost:8000/api'
});

axiosClient.interceptors.request.use(config => {
    return config;
});

export default axiosClient;
