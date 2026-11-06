<?php

declare(strict_types=1);

namespace ChartQuery;

// Generated from the ChartQuery OpenAPI document. Do not edit by hand.

/**
 * One method per documented ChartQuery endpoint. Used by {@see Client}.
 */
trait Operations
{
    /**
     * @param array<string, mixed> $params
     */
    abstract protected function callOperation(string $name, array $params, ?RequestOptions $options): JsonResponse|BinaryResponse;

    /**
     * Barcode. Generate a barcode image via GET. Output: SVG (default) or PNG. Supports 25+ formats: EAN-13, Code 128, ITF-14, GS1-128, postal codes and more. Credit cost: 3 credits per call.
     *
     * `GET / POST /v1/barcode`
     *
     * @param array{data: string, type?: string, height?: int|float, color?: string, show_text?: bool, text_position?: string, text_align?: string, font_size?: int|float, font_family?: string, bar_width?: int|float, bar_gap?: int|float, background?: string, margin?: int|float, margin_top?: int|float, margin_bottom?: int|float, margin_left?: int|float, margin_right?: int|float, rotation?: int|float, bearer_bars?: bool, unit?: string, aria_label?: string, title?: string, desc?: string, format?: string, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - data (required): The data to encode in the barcode. Examples by type:
     *   - type: Barcode format. Default: code128.
     *   - height: Bar height in pixels. Default: 80. Typical values: 50 (compact), 80 (standard), 100–120 (tall labels). Example: ?height=100
     *   - color: Bar color as a CSS color string. Default: #000. Examples: ?color=%231e293b (dark slate), ?color=%230f172a (near black), ?color=%237c3aed (purple), ?color=%23dc…
     *   - show_text: Show human-readable text below the bars. Example: ?show_text=true. Combine with font_size and text_align for print labels.
     *   - text_position: Position of the human-readable text label. Default: bottom. Example: ?text_position=top
     *   - text_align: Horizontal alignment of the text label. Default: center. Example: ?text_align=left
     *   - font_size: Font size of the text label in pixels. Default: 14. Example: ?font_size=12
     *   - font_family: Font family of the text label. Default: monospace. Examples: ?font_family=monospace, ?font_family=sans-serif, ?font_family=Arial
     *   - bar_width: Width multiplier per module (bar). Default: 2. Increase for wider, more scannable barcodes. Example: ?bar_width=3
     *   - bar_gap: Extra horizontal spacing between bars in pixels. Default: 0. Example: ?bar_gap=1
     *   - background: Background fill color. Default: #fff. Use transparent for no background. Example: ?background=%23f8fafc
     *   - margin: Uniform margin around the barcode in pixels. Default: 10. Overridden per side by margin_top/bottom/left/right. Example: ?margin=6
     *   - margin_top: Top margin in pixels (overrides margin). Example: ?margin_top=4
     *   - margin_bottom: Bottom margin in pixels (overrides margin). Example: ?margin_bottom=4
     *   - margin_left: Left margin in pixels (overrides margin). Example: ?margin_left=8
     *   - margin_right: Right margin in pixels (overrides margin). Example: ?margin_right=8
     *   - rotation: Rotate the barcode by 0, 90, 180 or 270 degrees. Default: 0. Use 90 or 270 for vertical label orientation. Example: ?rotation=90
     *   - bearer_bars: Add horizontal bearer bars above and below the barcode. Required for ITF-14. Default: false. Example: ?bearer_bars=true
     *   - unit: Measurement unit for dimensions. Default: px. Use mm, in or cm for print-ready output. Example: ?unit=mm
     *   - aria_label: Accessible label added as aria-label on the SVG element. Improves screen reader support. Example: ?aria_label=EAN-13+barcode+for+product+4006381333931
     *   - title: SVG <title> element for tooltip and accessibility. Example: ?title=Product+Barcode
     *   - desc: SVG <desc> element for extended accessibility description. Example: ?desc=EAN-13+encoding+GTIN+for+Nivea+cream+75ml
     *   - format: Output format. Default: svg. Use png to get a raster image. SVG is lossless and scalable; PNG is pixel-based and suitable for email, PDF or messaging. Example:…
     *   - share: Set share=true to persist the config and receive JSON instead of an image: { id, render_url, view_url, embed_url, expires_in }. Free plan: 3-day expiry with wa…
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function barcode(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('barcode', $params, $options);
    }

    /**
     * Chart. Render a Chart.js image via GET. Pass the full chart object as URL-encoded JSON in query. Prefer format png for ChatGPT. POST sends the same object as a JSON body, not query. Credit cost: 5 credits per call.
     *
     * `GET / POST /v1/chart`
     *
     * @param array{query: string, version?: string, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - query (required): Full chart config as URL-encoded JSON. Pass ?version= or ?v= separately to pin the chart version.
     *   - version: Chart.js version to use. Alias: ?v=. Only v4.x is supported. Defaults to the installed version (4.5.1). Example: "4", "4.5", "4.5.1". The installed version is…
     *   - share: If true, persist the result and return share URLs instead of an image. Leave false to get the image.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function chart(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('chart', $params, $options);
    }

    /**
     * Chart AI. Describe a chart in plain English via GET and get a rendered image back. Powered by AI. Credit cost: 10 credits per call.
     *
     * `GET / POST /v1/chart/ai`
     *
     * @param array{prompt: string, raw_data?: string, title?: string, subtitle?: string, legend?: string, format?: string, width?: int|float, height?: int|float, background?: string, device_pixel_ratio?: int|float, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - prompt (required): Describe your chart in plain English (max 1000 chars). Be specific: mention chart type, data topic, colors, style.
     *   - raw_data: Raw data for the chart. URL-encoded string, CSV, or JSON. AI will parse and structure it.
     *   - title: Override the chart title generated by AI.
     *   - subtitle: Override the chart subtitle.
     *   - legend: Legend position or visibility. Use "false" to hide.
     *   - format: Output format. Default: "png".
     *   - width: Image width in pixels (50–4000). Default: 1200.
     *   - height: Image height in pixels (50–4000). Default: 600.
     *   - background: Background color as a hex value. Default: #ffffff.
     *   - device_pixel_ratio: Device pixel ratio for the rendered image. Default: 1.
     *   - share: Set share=true to persist the config and receive JSON instead of an image: { id, render_url, view_url, embed_url, expires_in }. Free plan: 3-day expiry with wa…
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function chartAi(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('chart_ai', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Chart Render. Render a previously saved chart by ID. Public, no API key required. Supports URL overrides for templates (?data1=, ?labels=, ?title=…).
     *
     * `GET /v1/chart/render/{id}`
     *
     * @param array{id: string, title?: string, labels?: string, data1?: string, width?: string, height?: string, format?: string, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - id (required): The chart ID returned in the X-Chart-Render-URL header when saving a chart. Format: cq-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.
     *   - title: Override the chart title.
     *   - labels: Override X-axis labels. Comma-separated.
     *   - data1: Override first dataset values. Comma-separated numbers. Use data2, data3… for additional datasets.
     *   - width: Override output width in pixels (50–4000).
     *   - height: Override output height in pixels (50–4000).
     *   - format: Override output format.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function chartRender(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('chart_render', $params, $options);
    }

    /**
     * Chart View. View a previously saved chart as an interactive HTML page. Public, no API key required. Iframe-embeddable.
     *
     * `GET /v1/chart/view/{id}`
     *
     * @param array{id: string, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - id (required): The chart ID returned in the X-Chart-View-URL header when saving a chart. Format: cq-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.
     *   - share: Set share=true to persist the config and receive JSON instead of an image: { id, render_url, view_url, embed_url, expires_in }. Free plan: 3-day expiry with wa…
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function chartView(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('chart_view', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Diagram. Render a diagram via GET. Use type (mermaid, d2, …), query (source code), and format=png for ChatGPT. POST uses diagram_type and diagram_source instead. Credit cost: 5 credits per call.
     *
     * `GET / POST /v1/diagram`
     *
     * @param array{type: string, query: string, format?: string, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - type (required): Diagram language.
     *   - query (required): Diagram source code (URL-encoded).
     *   - format: Use png so ChatGPT can display the image. svg is for download or infinite scale.
     *   - share: If true, persist the result and return share URLs instead of an image. Leave false to get the image.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function diagram(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('diagram', $params, $options);
    }

    /**
     * Diagram AI. Describe a diagram in plain English via GET and get a rendered image back. Powered by AI. Credit cost: 10 credits per call.
     *
     * `GET / POST /v1/diagram/ai`
     *
     * @param array{prompt: string, diagram_type?: string, output_format?: string, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - prompt (required): Describe your diagram in plain English (max 1000 chars). Be specific: mention the diagram type, key entities, and relationships.
     *   - diagram_type: Preferred diagram language. AI chooses if omitted. Examples: "mermaid", "d2", "plantuml", "graphviz".
     *   - output_format: Output format. Default: "svg".
     *   - share: Set share=true to persist the config and receive JSON instead of an image: { id, render_url, view_url, embed_url, expires_in }. Free plan: 3-day expiry. Paid p…
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function diagramAi(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('diagram_ai', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Diagram Render. Render a previously saved diagram by ID. Public, no API key required. Supports ?format= and ?query= overrides.
     *
     * `GET /v1/diagram/render/{id}`
     *
     * @param array{id: string, format?: string, query?: string, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - id (required): The diagram ID returned in the X-Diagram-Render-URL header when saving a diagram. Format: cq-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.
     *   - format: Override output format.
     *   - query: Override the diagram source code (URL-encoded).
     *   - share: Set share=true to persist the config and receive JSON instead of an image: { id, render_url, view_url, embed_url, expires_in }. Free plan: 3-day expiry with wa…
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function diagramRender(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('diagram_render', $params, $options);
    }

    /**
     * Diagram View. View a previously saved diagram as an HTML page. Public, no API key required. Iframe-embeddable with inline SVG rendering.
     *
     * `GET /v1/diagram/view/{id}`
     *
     * @param array{id: string, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - id (required): The diagram ID returned in the X-Diagram-View-URL header when saving a diagram. Format: cq-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.
     *   - share: Set share=true to persist the config and receive JSON instead of an image: { id, render_url, view_url, embed_url, expires_in }. Free plan: 3-day expiry with wa…
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function diagramView(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('diagram_view', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Jobs. Poll the status, progress (0–100) and result of a job started with is_async=true. Polling is free. Poll until status is terminal: CompletedJob, Error, NotFound or BadRequest.
     *
     * `GET /v1/jobs/{id}`
     *
     * @param array{id: string} $params
     *   - id (required): The job_id returned by an endpoint called with is_async=true.
     */
    public function jobs(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('jobs', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Label Preview. Preview a thermal label via GET. Pass the same label object as a URL-encoded JSON string in query. Inside that JSON, text items use content and size (1-10), not text or fontSize. Prefer format=png for ChatGPT. Credit cost: 3 credits per call.
     *
     * `GET / POST /v1/label`
     *
     * @param array{format?: string, share?: bool, query: string, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - format: Use png so ChatGPT can display the image. svg is for download or infinite scale.
     *   - share: If true, persist the result and return share URLs instead of an image. Leave false to get the image.
     *   - query (required): Full label config as URL-encoded JSON. Must include width and elements. Text items use content and size (1-10), not text or fontSize.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function label(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('label', $params, $options);
    }

    /**
     * Label Compile. Compile a label to printer commands (tsc, zpl, epl, …). POST width, language, and elements. Text uses content and size (1-10), not text or fontSize. No barcode element. Example: {"width":40,"height":30,"unit":"mm","language":"zpl","element… Credit cost: 3 credits per call.
     *
     * `POST /v1/label/compile`
     *
     * @param array{width: int|float, height?: int|float, unit?: string, dpi?: int|float, gap?: int|float, speed?: int|float, density?: int|float, direction?: int|float, copies?: int|float, printer?: string, elements: list<array<string, mixed>>, language: string, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - width (required): Label width. Required. Default unit is mm. Example: 40. Do not send query instead of width.
     *   - height: Label height in the same unit. Example: 30. Omit for receipt / continuous mode.
     *   - unit: Measurement unit for width and height. Default mm. Use mm unless you are working in printer dots.
     *   - dpi: Printer DPI. Default 203.
     *   - gap: Gap between labels in mm. Ignored for receipts.
     *   - speed: Print speed, 1-18.
     *   - density: Print darkness, 0-15.
     *   - direction: Print direction. 0 = normal, 1 = reversed.
     *   - copies: Number of copies. Minimum 1.
     *   - printer: Printer profile id (tsc-te210, zebra-zd420, …).
     *   - elements (required): Required array. Text items need type=text, content, and size (1-10 magnification). Do not use text, fontSize, or type=barcode. Positions x/y are in dots. Examp…
     *   - language (required): Required printer language. Example: zpl or tsc. Do not omit.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function labelCompile(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('label_compile', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Label Convert. Convert printer commands from one language to another. POST source, from, and to. from is the source language (tsc, zpl, epl, …). to is the target (tsc, zpl, escpos, …). Credit cost: 5 credits per call.
     *
     * `POST /v1/label/convert`
     *
     * @param array{source: string, from: string, to: string, dpi?: int|float, speed?: int|float, density?: int|float, copies?: int|float, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - source (required): Raw printer commands to convert. Also send from and to.
     *   - from (required): Source language.
     *   - to (required): Target language.
     *   - dpi: Override DPI on the converted output.
     *   - speed: Override print speed, 1-18.
     *   - density: Override print darkness, 0-15.
     *   - copies: Override copies. Minimum 1.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function labelConvert(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('label_convert', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Label Parse. Parse printer commands into structured elements. POST source and language (tsc, zpl, epl, …). Credit cost: 1 credit per call.
     *
     * `POST /v1/label/parse`
     *
     * @param array{source: string, language: string, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - source (required): Raw printer commands to parse. Also send language.
     *   - language (required): Language of the source commands. Example: tsc or zpl.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function labelParse(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('label_parse', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Label Render. Render a previously saved label by ID. Public, no API key required. Supports ?format= override.
     *
     * `GET /v1/label/render/{id}`
     *
     * @param array{id: string, format?: string, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - id (required):
     *   - format: Override output format.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function labelRender(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('label_render', $params, $options);
    }

    /**
     * Label Validate. Validate printer commands. POST source (the raw commands) and language (tsc, zpl, epl, …). Credit cost: 1 credit per call.
     *
     * `POST /v1/label/validate`
     *
     * @param array{source: string, language: string, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - source (required): Raw printer commands to validate. Also send language.
     *   - language (required): Language of the source commands. Example: tsc or zpl.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function labelValidate(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('label_validate', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Label View. View a previously saved label as an HTML page. Public, no API key required. Iframe-embeddable with inline SVG rendering.
     *
     * `GET /v1/label/view/{id}`
     *
     * @param array{id: string, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - id (required):
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function labelView(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('label_view', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * QR Code. Generate a styled QR code via GET. Output: SVG (default) or PNG. Supports dot styles, gradients, custom corners and all QR versions. Credit cost: 3 credits per call.
     *
     * `GET / POST /v1/qrcode`
     *
     * @param array{data: string, size?: int|float, ec_level?: string, dot_type?: string, color?: string, shape?: string, dot_size?: int|float, background?: string, margin?: int|float, version?: int|float, mode?: string, mask?: int|float, unit?: string, xml_declaration?: bool, aria_label?: string, title?: string, desc?: string, format?: string, share?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - data (required): Data to encode in the QR code. Examples:
     *   - size: Output size in pixels (width = height). Default: 200. Examples: ?size=200 (thumbnail), ?size=300 (standard), ?size=400 (large), ?size=600 (poster). For print,…
     *   - ec_level: Error correction level. Default: M. Higher levels allow more damage/obscuring before the code becomes unreadable.
     *   - dot_type: Module (dot) shape. Default: square. Controls the visual style of each QR code module.
     *   - color: Module color as CSS hex. Default: #000. Examples: ?color=%236366f1 (indigo), ?color=%23dc2626 (red), ?color=%23059669 (green), ?color=%230891b2 (teal). Use %23…
     *   - shape: Overall QR code shape. Default: square. Use circle to clip the entire QR into a circle: great for profile/avatar-style codes. Example: ?shape=circle&dot_type=d…
     *   - dot_size: Module size ratio between 0.1 and 1. Default: 1 (full). Values below 1 add spacing between modules for a lighter look. Example: ?dot_size=0.85
     *   - background: Background color. Default: #fff. Set to transparent for no background. Example: ?background=%230f172a for dark background. Use %23 to encode #.
     *   - margin: Quiet zone width in modules around the QR code. Default: 4. Minimum recommended by the QR standard: 4. Example: ?margin=2 (compact) or ?margin=6 (extra padding…
     *   - version: QR version from 1 to 40 (determines grid size and data capacity). Leave unset for auto-selection based on data length and ec_level. Example: ?version=5
     *   - mode: Encoding mode. Default: auto (best mode selected for the data). Use numeric for digits-only, alphanumeric for uppercase + digits, byte for arbitrary text/UTF-8…
     *   - mask: Mask pattern from 0 to 7. Default: auto (best mask selected to minimize visual patterns). Only set manually if you need a deterministic output. Example: ?mask=3
     *   - unit: Measurement unit for the size param. Default: px. Use mm, in or cm with the size param for print-ready output. Example: ?size=50&unit=mm
     *   - xml_declaration: Prepend an XML declaration (<?xml version="1.0" encoding="UTF-8"?>) to the SVG output. Useful when the SVG will be used as a standalone XML file. Default: fals…
     *   - aria_label: Accessible label added as aria-label on the SVG element. Example: ?aria_label=QR+code+linking+to+chartquery.com
     *   - title: SVG <title> element shown as a browser tooltip and used by screen readers. Example: ?title=ChartQuery+Website
     *   - desc: SVG <desc> element for extended accessibility description. Example: ?desc=Scan+to+visit+https://chartquery.com
     *   - format: Output format. Default: svg. Use png to get a raster image. SVG is lossless and scalable; PNG is pixel-based and suitable for email, PDF or messaging. Example:…
     *   - share: Set share=true to persist the config and receive JSON instead of an image: { id, render_url, view_url, embed_url, expires_in }. Free plan: 3-day expiry with wa…
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function qrcode(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('qrcode', $params, $options);
    }

    /**
     * Stats. Infrastructure health for an engine or endpoint over the last hour. Not scoped to your account or tenant. Enabled per account: HTTP 403 means contact support to activate it.
     *
     * `GET /v1/stats`
     *
     * @param array{engine?: string, path?: string} $params
     *   - engine: API family to check, for example chart. Provide at least engine or path.
     *   - path: Specific endpoint to check, for example /v1/chart. If you also pass engine, use an endpoint from that API.
     */
    public function stats(array $params = [], ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('stats', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Usage. Return this account's Chartquery usage and credit balance. No body. Requires an API key.
     *
     * `GET /v1/usage`
     *
     * @param array{} $params
     */
    public function usage(array $params = [], ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('usage', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }
}
