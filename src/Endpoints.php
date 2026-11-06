<?php

declare(strict_types=1);

namespace ChartQuery;

// Generated from the ChartQuery OpenAPI document. Do not edit by hand.

/**
 * Path, methods, response kind and parameter names of every documented operation.
 */
final class Endpoints
{
    /**
     * @var array<string, array{path: string, methods: list<'GET'|'POST'>, response: 'json'|'any', required: list<string>, params: list<string>}>
     */
    public const ALL = [
        'barcode' => [
            'path' => '/v1/barcode',
            'methods' => ['GET', 'POST'],
            'response' => 'any',
            'required' => ['data'],
            'params' => ['data', 'type', 'height', 'color', 'show_text', 'text_position', 'text_align', 'font_size', 'font_family', 'bar_width', 'bar_gap', 'background', 'margin', 'margin_top', 'margin_bottom', 'margin_left', 'margin_right', 'rotation', 'bearer_bars', 'unit', 'aria_label', 'title', 'desc', 'format', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'chart' => [
            'path' => '/v1/chart',
            'methods' => ['GET', 'POST'],
            'response' => 'any',
            'required' => ['query'],
            'params' => ['query', 'version', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'chart_ai' => [
            'path' => '/v1/chart/ai',
            'methods' => ['GET', 'POST'],
            'response' => 'json',
            'required' => ['prompt'],
            'params' => ['prompt', 'raw_data', 'title', 'subtitle', 'legend', 'format', 'width', 'height', 'background', 'device_pixel_ratio', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'chart_render' => [
            'path' => '/v1/chart/render/{id}',
            'methods' => ['GET'],
            'response' => 'any',
            'required' => ['id'],
            'params' => ['id', 'title', 'labels', 'data1', 'width', 'height', 'format', 'fields', 'is_async', 'soft_fail'],
        ],
        'chart_view' => [
            'path' => '/v1/chart/view/{id}',
            'methods' => ['GET'],
            'response' => 'json',
            'required' => ['id'],
            'params' => ['id', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'diagram' => [
            'path' => '/v1/diagram',
            'methods' => ['GET', 'POST'],
            'response' => 'any',
            'required' => ['type', 'query'],
            'params' => ['type', 'query', 'format', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'diagram_ai' => [
            'path' => '/v1/diagram/ai',
            'methods' => ['GET', 'POST'],
            'response' => 'json',
            'required' => ['prompt'],
            'params' => ['prompt', 'diagram_type', 'output_format', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'diagram_render' => [
            'path' => '/v1/diagram/render/{id}',
            'methods' => ['GET'],
            'response' => 'any',
            'required' => ['id'],
            'params' => ['id', 'format', 'query', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'diagram_view' => [
            'path' => '/v1/diagram/view/{id}',
            'methods' => ['GET'],
            'response' => 'json',
            'required' => ['id'],
            'params' => ['id', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'jobs' => [
            'path' => '/v1/jobs/{id}',
            'methods' => ['GET'],
            'response' => 'json',
            'required' => ['id'],
            'params' => ['id'],
        ],
        'label' => [
            'path' => '/v1/label',
            'methods' => ['GET', 'POST'],
            'response' => 'any',
            'required' => ['query'],
            'params' => ['format', 'share', 'query', 'fields', 'is_async', 'soft_fail'],
        ],
        'label_compile' => [
            'path' => '/v1/label/compile',
            'methods' => ['POST'],
            'response' => 'json',
            'required' => ['width', 'elements', 'language'],
            'params' => ['width', 'height', 'unit', 'dpi', 'gap', 'speed', 'density', 'direction', 'copies', 'printer', 'elements', 'language', 'fields', 'is_async', 'soft_fail'],
        ],
        'label_convert' => [
            'path' => '/v1/label/convert',
            'methods' => ['POST'],
            'response' => 'json',
            'required' => ['source', 'from', 'to'],
            'params' => ['source', 'from', 'to', 'dpi', 'speed', 'density', 'copies', 'fields', 'is_async', 'soft_fail'],
        ],
        'label_parse' => [
            'path' => '/v1/label/parse',
            'methods' => ['POST'],
            'response' => 'json',
            'required' => ['source', 'language'],
            'params' => ['source', 'language', 'fields', 'is_async', 'soft_fail'],
        ],
        'label_render' => [
            'path' => '/v1/label/render/{id}',
            'methods' => ['GET'],
            'response' => 'any',
            'required' => ['id'],
            'params' => ['id', 'format', 'fields', 'is_async', 'soft_fail'],
        ],
        'label_validate' => [
            'path' => '/v1/label/validate',
            'methods' => ['POST'],
            'response' => 'json',
            'required' => ['source', 'language'],
            'params' => ['source', 'language', 'fields', 'is_async', 'soft_fail'],
        ],
        'label_view' => [
            'path' => '/v1/label/view/{id}',
            'methods' => ['GET'],
            'response' => 'json',
            'required' => ['id'],
            'params' => ['id', 'fields', 'is_async', 'soft_fail'],
        ],
        'qrcode' => [
            'path' => '/v1/qrcode',
            'methods' => ['GET', 'POST'],
            'response' => 'any',
            'required' => ['data'],
            'params' => ['data', 'size', 'ec_level', 'dot_type', 'color', 'shape', 'dot_size', 'background', 'margin', 'version', 'mode', 'mask', 'unit', 'xml_declaration', 'aria_label', 'title', 'desc', 'format', 'share', 'fields', 'is_async', 'soft_fail'],
        ],
        'stats' => [
            'path' => '/v1/stats',
            'methods' => ['GET'],
            'response' => 'json',
            'required' => [],
            'params' => ['engine', 'path'],
        ],
        'usage' => [
            'path' => '/v1/usage',
            'methods' => ['GET'],
            'response' => 'json',
            'required' => [],
            'params' => [],
        ],
    ];

    /**
     * SDK method name to endpoint name, for batch().
     *
     * @var array<string, string>
     */
    public const METHODS = [
        'barcode' => 'barcode',
        'chart' => 'chart',
        'chartAi' => 'chart_ai',
        'chartRender' => 'chart_render',
        'chartView' => 'chart_view',
        'diagram' => 'diagram',
        'diagramAi' => 'diagram_ai',
        'diagramRender' => 'diagram_render',
        'diagramView' => 'diagram_view',
        'jobs' => 'jobs',
        'label' => 'label',
        'labelCompile' => 'label_compile',
        'labelConvert' => 'label_convert',
        'labelParse' => 'label_parse',
        'labelRender' => 'label_render',
        'labelValidate' => 'label_validate',
        'labelView' => 'label_view',
        'qrcode' => 'qrcode',
        'stats' => 'stats',
        'usage' => 'usage',
    ];
}
