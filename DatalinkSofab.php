<?php

require_once 'HyQuery.php';

class DatalinkSofab extends HyQuery {

    public function getProjects() {
        $query = [
            "query" => "query GetProjects {
                projects {
                    id
                    title
                    content
                    image {
                        url
                    }
                }
            }",
            "variables" => null,
            "operationName" => "GetProjects"
        ];

        $result = $this->sendQuery($query);
        return $result["data"]["projects"];
    }

    public function getArticles() {
        $query = [
            "query" => "query GetArticles {
                articles {
                    id
                    title
                    content
                }
            }",
            "variables" => null,
            "operationName" => "GetArticles"
        ];

        $result = $this->sendQuery($query);
        return $result["data"]["articles"];
    }

    


}
